<?php
 
// namespace de localizacao
namespace Representada\Controller;
 
use Propel;
use Application\Controller\ActionController;
use Zend\Filter\File\Rename;
use Zend\View\Model\ViewModel;

class ProdutosController extends ActionController
{

    // GET /clientes/novo
    public function novoAction()
    {
        $idrep = (int) $this->params()->fromRoute('idrep', 0);
        $id = (int) $this->params()->fromRoute('id', 0);
        
        if($idrep == ""){
            return $this->redirect()->toRoute('representadas');
        }
       
        $representada = \RepresentadaQuery::create()
                ->filterByCoRepresentada($idrep)->findOne();
        
        return array('message' => $this->getFlashMessenger(),
                    'representada'=>$representada,
                    'id'=>$id,
                    'idrep'=>$idrep);
    }
    
    
    public function produtoAction()
    {

        $id = (int) $this->params()->fromRoute('id', 0);
        
        if($id == ""){
            $content = json_encode(array('erro'=>'Nenhum produto informado!'));
        }
        
        $oProduto = \ProdutoRepresentadaQuery::create()
                ->filterByCoProduto($id)
                ->findOne();
        
        if($oProduto){
            $content = $oProduto->toJSON();
        }else{
            $content = json_encode(array('erro'=>'Nenhum produto encontrado!'));
        }
      
        
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent($content);
        return $response;
        
    }
    // POST /clientes/adicionar
    public function adicionarAction()
    {
        $request = $this->getRequest();
 
        // verifica se a requisição é do tipo post
        if ($request->isPost()) {
            // obter e armazenar valores do post
            $postData = $request->getPost()->toArray();

                try{
                    $mime2ext = array();                    
                    $mime2ext['image/jpg'] = '.jpg'; 
                    $mime2ext['image/jpeg'] = '.jpg'; 
                    $mime2ext['image/png'] = '.png'; 
                    $mime2ext['image/gif'] = '.gif';

                    $File = $this->params()->fromFiles('no_foto');
                    $diretorio = $request->getServer('DOCUMENT_ROOT', false) . "/produto-representada";
                    /*
                     * Gravar arquivo
                     */
                    
                    if($File['error'] == 0){
                        // upload arquivo
                        $size = new \Zend\Validator\File\Size(array('max' => '5000000'));                    
                        $size->setMessage("O tamanho máximo permitido para o arquivo é '%max%' mas '%size%' foi detectado");

                        $extension = new \Zend\Validator\File\Extension(array('jpg','jpeg', 'png', 'gif'));
                        $extension->setMessage("O arquivo tem uma extensão incorreta");

                        $adapter = new \Zend\File\Transfer\Adapter\Http();
                        $extensao =  $mime2ext[$adapter->getMimeType()];
                        $fileName = md5(date('YmdHis')).$extensao;
                        $adapter->setValidators(array($size,$extension), $File['name']);
                        $adapter->addFilter('Rename', $diretorio."/".$fileName);

                        if (!$adapter->isValid()) {
                            $dataError = $adapter->getMessages();            
                            $error = array();
                            foreach ($dataError as $key => $row) {
                                $error[] = $row;
                            }
                
                            $this->flashMessenger()->addErrorMessage($error);
                        } else {
                            $adapter->setDestination($diretorio);
                            if ($adapter->receive($File['name'])) {
                                
                                $aFile = $adapter->getFileInfo();
                                
                                if($aFile['no_foto']['size'] > 1000000){
                                    $percetReducao = 40;
                                }else if($aFile['no_foto']['size'] < 900000){
                                    $percetReducao = 70;                                    
                                }else if($aFile['no_foto']['size'] < 90000){
                                    $percetReducao = 80;
                                }else{
                                    $percetReducao = 100;
                                }
                                
                               
                                
                                $postData = array_merge($postData,array('no_imagem'=>$fileName));
                                /*
                                 * Cria thumb
                                 */
                                $thumbnailer = $this->getServiceLocator()->get('WebinoImageThumb');
                                $thumb       = $thumbnailer->create($diretorio."/".$fileName, $options = array());
                                $thumb->resizePercent(10);
                                $thumb->save($diretorio."/"."thumb_".$fileName);
                                
                                $thumb       = $thumbnailer->create($diretorio."/".$fileName, $options = array());
                                $thumb->resizePercent($percetReducao);
                                $thumb->save($diretorio."/".$fileName);
                                
                                
                                

                                $this->flashMessenger()->addInfoMessage(" Imagem adicionada com sucesso");
                            }
                        }
                    }    
                    \ProdutoRepresentadaPeer::gravaProduto($postData);
                   
                }  catch (Exception $e){
                    $this->flashMessenger()->addErrorMessage( $e->getMessage());                    
                    return $this->redirect()->toRoute('representadas',array('action' => 'detalhes', 'id' =>$postData['idrep']));
                }
                
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Produto adicionado com sucesso");
               
                return $this->redirect()->toRoute('representadas',array('action' => 'detalhes', 'id' =>$postData['idrep']));
           }
    }
    
    // GET /clientes/editar/id
    public function editarAction()
    {
       
        // filtra id passsado pela url
         $id = (int) $this->params()->fromRoute('id', 0);
         $idrep = (int) $this->params()->fromRoute('idrep', 0);

        // se id = 0 ou não informado redirecione para clientes
        if (!$id) {

            // adicionar mensagem de erro
            $this->flashMessenger()->addErrorMessage("Produto não encotrado");

            // redirecionar para action index
            return $this->redirect()->toRoute('representadas',array('action' => 'detalhes', 'id' =>$idrep));
        }

        // aqui vai a lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse contato encontrado

        
             $oRepresentada = \RepresentadaQuery::create()
                            ->filterByCoRepresentada($idrep)
                            ->findOne();
            
             $oProduto = \ProdutoRepresentadaQuery::create()
                            ->filterByCoProduto($id)
                            ->findOne();
             
        // dados eviados para editar.phtml
        return array('id' => $id, 
                     'idrep' => $idrep, 
                     'oRepresentada' => $oRepresentada, 
                     'oProduto' => $oProduto, 
                     'message' => $this->getFlashMessenger());
    }
 
    // PUT /clientes/editar/id
    public function atualizarAction()
    {
        // obtém a requisição
        $request = $this->getRequest();

        // verifica se a requisição é do tipo post
        if ($request->isPost()) {
            // obter e armazenar valores do post
            $postData = $request->getPost()->toArray();
            $formularioValido = true;

            // verifica se o formulário segue a validação proposta
            if ($formularioValido) {
                // aqui vai a lógica para editar os dados à tabela no banco
                // 1 - solicitar serviço para pegar o model responsável pela atualização
                // 2 - editar dados no banco pelo model
                try{
                    \ProdutoRepresentadaPeer::gravaProduto($postData);
                }  catch (Exception $e){
                    echo $e->getMessage();
                    
                    $this->flashMessenger()->addSuccessMessage( $e->getMessage());
                    #$this->logger()->err( $e->getMessage());
                    
                     return $this->redirect()->toRoute('representadas',array('action' => 'detalhes', 'id' =>$postData['idrep']));
                }
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Produto salvo com sucesso");

                // redirecionar para action detalhes
                return $this->redirect()->toRoute('representadas',array('action' => 'detalhes', 'id' =>$postData['idrep']));
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao editar produto");

                // redirecionar para action editar
                return $this->redirect()->toRoute('representadas',array('action' => 'detalhes', 'id' =>$postData['idrep']));
            }
        }
    }
 
    // DELETE /clientes/deletar/id
    public function deletarAction()
    {
        $pdo = Propel::getConnection();  
        
        // filtra id passsado pela url
        $id = $this->params()->fromRoute('id', 0);
        $idrep = $this->params()->fromRoute('idrep', 0);
    
        if($id != "" && is_numeric($id)){
            // se id = 0 ou não informado redirecione para clientes
            if (!$id) {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Produto não encotrado");

            } else {
                // aqui vai a lógica para deletar o contato no banco
                // 1 - solicitar serviço para pegar o model responsável pelo delete
                // 2 - deleta contato
                try{

                    $oProdutoImagem =  \ProdutoImagemQuery::create()
                                        ->filterByCoProduto($id)
                                        ->find();
                    $oProduto = \ProdutoRepresentadaQuery::create()
                                ->filterByCoProduto($id)
                                ->findOne();
                    
                    if($oProduto){
                        $pdo->beginTransaction();                        
                        $oProdutoImagem->delete();
                        $oProduto->delete();
                        $pdo->commit();
                        
                        // adicionar mensagem de sucesso
                        $this->flashMessenger()->addSuccessMessage("Produto deletado com sucesso");
                    
                    }else{
                        // adicionar mensagem de erro
                        $this->flashMessenger()->addErrorMessage("Produto não encotrado");
                    }
                    
                }  catch (Exception $e){  
                    
                    #$this->logger()->err($e->getMessage());
                    
                    $pdo->rollBack();
                }
                

            }
        }else{
             $this->flashMessenger()->addErrorMessage("Produto não encotrado");
        }
        // redirecionar para action index
        return $this->redirect()->toRoute('representadas',array('action' => 'detalhes', 'id' =>$idrep));
    }
 
    // Filter Flash Messenger
    private function getFlashMessenger()
    {
        $messenger = array();
        $flashMessenger = $this->flashMessenger();
       
        
        if ($flashMessenger->hasSuccessMessages())
            $messenger['alert-success'] = array_shift($flashMessenger->getSuccessMessages());

        if ($flashMessenger->hasErrorMessages())
            $messenger['alert-error'] = array_shift($flashMessenger->getErrorMessages());
        
        if ($flashMessenger->hasInfoMessages())
            $messenger['alert-info'] = array_shift($flashMessenger->getInfoMessages());

        return $messenger;
    }
}
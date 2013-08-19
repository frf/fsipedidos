<?php
 
// namespace de localizacao clientesController.php
namespace Cliente\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Propel;
 
class ClientesController extends AbstractActionController
{
 
    // GET /clientes
    public function indexAction()
    {
        
        $cliente = \ClienteQuery::create()->find();
       
        return array('message' => $this->getFlashMessenger(),
                    'aCliente'=>$cliente);
    }
   // GET /clientes
    public function pedidosAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        
        if($id == ""){
            $this->flashMessenger()->addErrorMessage("Erro representada não existe.");
            return $this->redirect()->toRoute('representadas');
        }
        $oPedido = \PedidoQuery::create()
                ->filterByCoCliente($id)
                ->find();
        
        $oCliente = \ClienteQuery::create()
                ->filterByCoCliente($id)
                ->findOne();

        return array('message' => $this->getFlashMessenger(),
            'oPedido' => $oPedido,
            'oCliente' => $oCliente,
            'id'=>$id);
    }
    // GET /clientes/novo
    public function novoAction()
    {
        $cliente_tributacao = \ClienteTributacaoQuery::create()->find();
        return array('cliente_tributacao'=>$cliente_tributacao,'message' => $this->getFlashMessenger());
    }
    // GET /clientes/novo
    public function importarAction()
    {
        $cliente_tributacao = \ClienteTributacaoQuery::create()->find();
        
        // obtém a requisição
        $request = $this->getRequest();

        // verifica se a requisição é do tipo post
        if ($request->isPost()) {
            $File = $this->params()->fromFiles('no_file');
           
            $conteudoCsv = file_get_contents($File['tmp_name']);
            
            if(strlen($conteudoCsv)){
                $aListArquivo = explode("\n",$conteudoCsv);
               
                if(is_array($aListArquivo)){
                    array_shift($aListArquivo);
                    foreach($aListArquivo as $lineFile){
                        $aDadosCsv = explode(",",$lineFile);
                        if($aDadosCsv[1] != ""){
                            $aDados['co_cliente']   = 33;
                            $aDados['pessoa_tipo']  = "J";
                            $aDados['r_social']     = $aDadosCsv[0];
                            $aDados['no_cliente']   = $aDadosCsv[1];
                            $aDados['cnpj']         = $aDadosCsv[2];
                            $aDados['i_estadual']   = $aDadosCsv[3];
                        }
                        \ClientePeer::gravaCliente($aDados);
                    }
                    $this->flashMessenger()->addSuccessMessage("Cliente importado sucesso");                   
                    return $this->redirect()->toRoute('clientes');
                }
                
            }
           
        }
        
        return array('cliente_tributacao'=>$cliente_tributacao,'message' => $this->getFlashMessenger());
    }
 
    // POST /clientes/adicionar
    public function adicionarAction()
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
                // aqui vai a lógica para adicionar os dados à tabela no banco
                // 1 - solicitar serviço para pegar o model responsável pela adição
                // 2 - inserir dados no banco pelo model
                try{
                 
                    \ClientePeer::gravaCliente($postData);
                }  catch (Exception $e){
                     // adicionar mensagem de sucesso
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    #$this->logger()->info($e->getMessage());
                    
                     return $this->redirect()->toRoute('clientes');
                }
                

                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Cliente adicionado com sucesso");
                #$this->logger()->info('Cliente adicionado com sucesso');

                // redirecionar para action index no controller clientes
                return $this->redirect()->toRoute('clientes');
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao adicionar cliente");
                #$this->logger()->err('Erro ao adicionar cliente');

                // redirecionar para action novo no controllers clientes
                return $this->redirect()->toRoute('clientes', array('action' => 'novo'));
            }
        }
    }
 
    // GET /clientes/detalhes/id
    public function detalhesAction()
    {
        // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para clientes
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addErrorMessage("Cliente não encontrado");

            
            // redirecionar para action index
            return $this->redirect()->toRoute('clientes');
        }

        // aqui vai a lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse contato encontrado

        // formulário com dados preenchidos
         $cliente = \ClienteQuery::create()->filterByCoCliente($id)->findOne();
         
         if(!$cliente){
              // adicionar mensagem de erro
            $this->flashMessenger()->addErrorMessage("Cliente não encontrado");

            
            // redirecionar para action index
            return $this->redirect()->toRoute('clientes');
         }
         
         $endereco = \EnderecoQuery::create()->filterByCoPessoa($id)->find();
         $email = \EmailQuery::create()->filterByCoPessoa($id)->find();
         $telefone = \TelefoneQuery::create()->filterByCoPessoa($id)->find();

        // dados eviados para detalhes.phtml
        return array('id' => $id, 
            'oCliente' => $cliente, 
            'endereco' => $endereco, 
            'email' => $email, 
            'telefone' => $telefone, 
            'message' => $this->getFlashMessenger());
    }
 
    // GET /clientes/editar/id
    public function editarAction()
    {
        #print "<pre>";
        #print_r($this->params()->fromRoute());
        
        #exit;
        // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para clientes
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addErrorMessage("Contato não encotrado");

            // redirecionar para action index
            return $this->redirect()->toRoute('clientes');
        }

        // aqui vai a lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse contato encontrado

        // formulário com dados preenchidos
        
        $cliente = \ClienteQuery::create()->filterByCoCliente($id)->findOne();
        $cliente_tributacao = \ClienteTributacaoQuery::create()->find();

        // dados eviados para editar.phtml
        return array('id' => $id,'cliente_tributacao'=>$cliente_tributacao, 'oCliente' => $cliente, 'message' => $this->getFlashMessenger());
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
                 
                    \ClientePeer::gravaCliente($postData);
                }  catch (Exception $e){
                     // adicionar mensagem de sucesso
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    #$this->logger()->info($e->getMessage());
                    
                     return $this->redirect()->toRoute('clientes');
                }
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Cliente editado com sucesso");

                // redirecionar para action detalhes
                return $this->redirect()->toRoute('clientes', array("action" => "detalhes", "id" => $postData['co_cliente'],));
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao editar cliente");

                // redirecionar para action editar
                return $this->redirect()->toRoute('clientes', array('action' => 'editar', "id" => $postData['co_cliente'],));
            }
        }
    }
 
    // DELETE /clientes/deletar/id
    public function deletarAction()
    {
        // filtra id passsado pela url
        $id = $this->params()->fromRoute('id', 0);

        if($id != "" && is_numeric($id)){
            // se id = 0 ou não informado redirecione para clientes
            if (!$id) {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Cliente não encotrado");

            } else {
                // aqui vai a lógica para deletar o contato no banco
                // 1 - solicitar serviço para pegar o model responsável pelo delete
                // 2 - deleta contato
                try{
                 $oCliente = \ClienteQuery::create()->filterByCoCliente($id)->findOne();
                 $oPessoa = \PessoaQuery::create()->filterByCoPessoa($id)->findOne();
                 
                 $oCliente->delete();
                 $oPessoa->getEmails()->delete();
                 $oPessoa->getEnderecos()->delete();
                 $oPessoa->getTelefones()->delete();
                 $oPessoa->delete();
                 
                }  catch (Exception $e){
                     // adicionar mensagem de sucesso
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    #$this->logger()->info($e->getMessage());
                    
                     return $this->redirect()->toRoute('clientes');
                }
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Cliente deletado com sucesso");

            }
        }else{
             $this->flashMessenger()->addErrorMessage("Cliente não encotrado");
        }
        // redirecionar para action index
        return $this->redirect()->toRoute('clientes');
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
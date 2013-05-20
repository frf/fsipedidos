<?php
 
// namespace de localizacao clientesController.php
namespace Representada\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Propel;
 
class RepresentadasController extends AbstractActionController
{
 
    // GET /clientes
    public function indexAction()
    {
        
        $representada = \RepresentadaQuery::create()->find();
       
        return array('message' => $this->getFlashMessenger(),
                    'aRepresentada'=>$representada);
    }

    // GET /clientes/novo
    public function novoAction()
    {
        return array('message' => $this->getFlashMessenger());
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
                    \RepresentadaPeer::gravaRepresentada($postData);
                }  catch (Exception $e){
                    echo $e->getMessage();
                    
                    $this->flashMessenger()->addSuccessMessage( $e->getMessage());
                    $this->logger()->err( $e->getMessage());
                    
                     return $this->redirect()->toRoute('representadas');
                }
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Representada adicionada com sucesso");
                $this->logger()->info('Representada adicionada com sucesso');

                // redirecionar para action index no controller clientes
                return $this->redirect()->toRoute('representadas');
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao adicionar representada");
                $this->logger()->err('Erro ao adicionar representada');

                // redirecionar para action novo no controllers clientes
                return $this->redirect()->toRoute('representadas', array('action' => 'novo'));
            }
        }
    }
 
    //GET /clientes/detalhes/id
    public function detalhesAction()
    {
        // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para clientes
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addErrorMessage("Representada não encotrada");

            // redirecionar para action index
            return $this->redirect()->toRoute('representadas');
        }

        // aqui vai a lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse contato encontrado

        // formulário com dados preenchidos
        $representada = \RepresentadaQuery::create()->filterByCoRepresentada($id)->findOne();

        // dados eviados para detalhes.phtml
        return array('id' => $id, 'form' => $representada, 'message' => $this->getFlashMessenger());
    }
 
    // GET /clientes/editar/id
    public function editarAction()
    {
       
        // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para clientes
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addErrorMessage("Representada não encotrada");

            // redirecionar para action index
            return $this->redirect()->toRoute('representadas');
        }

        // aqui vai a lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse contato encontrado


        $representada = \RepresentadaQuery::create()->filterByCoRepresentada($id)->findOne();
        
        // dados eviados para editar.phtml
        return array('id' => $id, 'form' => $representada, 'message' => $this->getFlashMessenger());
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
                    \RepresentadaPeer::gravaRepresentada($postData);
                }  catch (Exception $e){
                    echo $e->getMessage();
                    
                    $this->flashMessenger()->addSuccessMessage( $e->getMessage());
                    $this->logger()->err( $e->getMessage());
                    
                     return $this->redirect()->toRoute('representadas');
                }
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Representada salvo com sucesso");

                // redirecionar para action detalhes
                return $this->redirect()->toRoute('representadas', array("action" => "detalhes", "id" => $postData['id'],));
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao editar contato");

                // redirecionar para action editar
                return $this->redirect()->toRoute('representadas', array('action' => 'editar', "id" => $postData['id'],));
            }
        }
    }
 
    // DELETE /clientes/deletar/id
    public function deletarAction()
    {
        $pdo = Propel::getConnection();  
        
        // filtra id passsado pela url
        $id = $this->params()->fromRoute('id', 0);

        if($id != "" && is_numeric($id)){
            // se id = 0 ou não informado redirecione para clientes
            if (!$id) {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Representada não encotrada");

            } else {
                // aqui vai a lógica para deletar o contato no banco
                // 1 - solicitar serviço para pegar o model responsável pelo delete
                // 2 - deleta contato
                try{

                    $oRepresentada = \RepresentadaQuery::create()->filterByCoRepresentada($id)->findOne();
                    $oPessoa = \PessoaQuery::create()->filterByCoPessoa($id)->findOne();
                    
                    if($oRepresentada){
                        $pdo->beginTransaction();                        
                        $oRepresentada->delete();
                        $oPessoa->delete();
                        $pdo->commit();
                        
                        // adicionar mensagem de sucesso
                        $this->flashMessenger()->addSuccessMessage("Representada deletada com sucesso");
                    
                    }else{
                        // adicionar mensagem de erro
                        $this->flashMessenger()->addErrorMessage("Representada não encotrada");
                    }
                    
                }  catch (Exception $e){  
                    
                    $this->logger()->err($e->getMessage());
                    
                    $pdo->rollBack();
                }
                

            }
        }else{
             $this->flashMessenger()->addErrorMessage("Representada não encotrada");
        }
        // redirecionar para action index
        return $this->redirect()->toRoute('representadas');
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
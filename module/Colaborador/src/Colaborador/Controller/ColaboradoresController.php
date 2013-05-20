<?php
 
// namespace de localizacao clientesController.php
namespace Colaborador\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Propel;
use Colaborador\Form\Colaborador;
 
class ColaboradoresController extends AbstractActionController
{
 
    // GET /clientes
    public function indexAction()
    {
       
        $colaborador = \ColaboradorQuery::create()->find();
       
        return array('message' => $this->getFlashMessenger(),
                    'aColaboradores'=>$colaborador);
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
            $formularioValido = false;

            // verifica se o formulário segue a validação proposta
            if ($formularioValido) {
                // aqui vai a lógica para adicionar os dados à tabela no banco
                // 1 - solicitar serviço para pegar o model responsável pela adição
                // 2 - inserir dados no banco pelo model

                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Contato criado com sucesso");

                // redirecionar para action index no controller clientes
                return $this->redirect()->toRoute('clientes');
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao criar contato");

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
            $this->flashMessenger()->addErrorMessage("Contato não encotrado");

            // redirecionar para action index
            return $this->redirect()->toRoute('clientes');
        }

        // aqui vai a lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse contato encontrado

        // formulário com dados preenchidos
        $form = array(
            'nome'                  => 'Igor Rocha',
            "telefone_principal"    => "(085) 8585-8585",
            "telefone_secundario"   => "(085) 8585-8585",
            "data_criacao"          => "02/03/2013",
            "data_atualizacao"      => "02/03/2013",
        );

        // dados eviados para detalhes.phtml
        return array('id' => $id, 'form' => $form, 'message' => $this->getFlashMessenger());
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
            $this->flashMessenger()->addErrorMessage("Colaborador não encotrado");

            // redirecionar para action index
            return $this->redirect()->toRoute('colaborador');
        }

        // aqui vai a lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse contato encontrado

        // formulário com dados preenchidos
        $oColaborador = \ColaboradorQuery::create()
                ->innerJoinPessoa()
                ->filterByCoColaborador($id)
                ->findOne();
        
        #$form = new Colaborador();
        #$form->populateValues($oColaborador);  
        
       
        // dados eviados para editar.phtml
        return array('id' => $id, 'form' => $oColaborador,'message' => $this->getFlashMessenger());
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

                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Contato editado com sucesso");

                // redirecionar para action detalhes
                return $this->redirect()->toRoute('clientes', array("action" => "detalhes", "id" => $postData['id'],));
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao editar contato");

                // redirecionar para action editar
                return $this->redirect()->toRoute('clientes', array('action' => 'editar', "id" => $postData['id'],));
            }
        }
    }
 
    // DELETE /clientes/deletar/id
    public function deletarAction()
    {
        // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para clientes
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addErrorMessage("Contato não encotrado");

        } else {
            // aqui vai a lógica para deletar o contato no banco
            // 1 - solicitar serviço para pegar o model responsável pelo delete
            // 2 - deleta contato

            // adicionar mensagem de sucesso
            $this->flashMessenger()->addSuccessMessage("Contato de ID $id deletado com sucesso");

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

        return $messenger;
    }
}
<?php

// namespace de localizacao clientesController.php

namespace Pedido\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Propel;

class PedidosController extends AbstractActionController {

    // GET /clientes
    public function indexAction() {

        $colaborador = \ColaboradorQuery::create()->find();

        return array('message' => $this->getFlashMessenger(),
            'aColaboradores' => $colaborador);
    }

    // GET /clientes/novo
    public function novoAction() {
        

        $oRepresentadas = \RepresentadaQuery::create()->find();
        #$form = new Colaborador();
        #$form->populateValues($oColaborador);  
        // dados eviados para editar.phtml
        return array('id' => $id,
            'representada' => $oRepresentadas,
            'message' => $this->getFlashMessenger());
    }

    // POST /clientes/adicionar
    public function adicionarAction() {
       
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
                // adicionar mensagem de sucesso
                
                try {

                    \ColaboradorPeer::gravaColaborador($postData);
                } catch (Exception $e) {
                    // adicionar mensagem de sucesso
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    #$this->logger()->info($e->getMessage());

                    return $this->redirect()->toRoute('colaboradores');
                }
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Colaborador adicionado com sucesso");

                // redirecionar para action index no controller clientes
                return $this->redirect()->toRoute('colaboradores');
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao criar colaborador");

                // redirecionar para action novo no controllers clientes
                return $this->redirect()->toRoute('colaboradores', array('action' => 'novo'));
            }
        }
    }

    // GET /clientes/detalhes/id
    public function detalhesAction() {
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
        $oColaborador = \ColaboradorQuery::create()
                ->innerJoinPessoa()
                ->filterByCoColaborador($id)
                ->findOne();

        $oRepresentadas = \RepresentadaQuery::create()->find();
        $oRepresentadasCol = \RepresentadaColaboradorQuery::create()
                ->filterByCoColaborador($id)
                ->find()
                ->toArray('CoRepresentada');
    
        // dados eviados para editar.phtml
        return array('id' => $id,
            'form' => $oColaborador,
            'representada' => $oRepresentadas,
            'aRepresentadasCol' => $oRepresentadasCol,
            'message' => $this->getFlashMessenger());
    }

    // GET /clientes/editar/id
    public function editarAction() {
      
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

        $oRepresentadas = \RepresentadaQuery::create()->find();
        
        $oRepresentadasCol = \RepresentadaColaboradorQuery::create()
                ->filterByCoColaborador($id)
                ->find()
                ->toArray('CoRepresentada');
    
        // dados eviados para editar.phtml
        return array('id' => $id,
            'form' => $oColaborador,
            'representada' => $oRepresentadas,
            'aRepresentadasCol' => $oRepresentadasCol,
            'message' => $this->getFlashMessenger());
    }

    // PUT /clientes/editar/id
    public function atualizarAction() {
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

                try {

                    \ColaboradorPeer::gravaColaborador($postData);
                } catch (Exception $e) {
                    // adicionar mensagem de sucesso
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    #$this->logger()->info($e->getMessage());

                    return $this->redirect()->toRoute('colaboradores');
                }
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Colaborador editado com sucesso");

                // redirecionar para action detalhes
                return $this->redirect()->toRoute('colaboradores', array("action" => "detalhes", "id" => $postData['CoColaborador'],));
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao editar colaborador");

                // redirecionar para action editar
                return $this->redirect()->toRoute('colaboradores', array('action' => 'editar', "id" => $postData['id'],));
            }
        }
    }

    // DELETE /clientes/deletar/id
    public function deletarAction() {
        // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para clientes
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addErrorMessage("Colaborador não encotrado");
        } else {
            // aqui vai a lógica para deletar o contato no banco
            // 1 - solicitar serviço para pegar o model responsável pelo delete
            // 2 - deleta contato

            try {
                $oRepCol = \RepresentadaColaboradorQuery::create()
                        ->filterByCoColaborador($id)
                        ->deleteAll();
                $oCliCol = \ClienteColaboradorQuery::create()
                        ->filterByCoColaborador($id)
                        ->deleteAll();
                $oColaborador = \ColaboradorQuery::create()
                        ->filterByCoColaborador($id)
                        ->delete();   
                $oUsuario = \UsuarioQuery::create()
                        ->filterByCoPessoa($id)
                        ->delete();
                $oPessoa = \PessoaQuery::create()
                        ->filterByCoPessoa($id)->delete();

            } catch (Exception $e) {
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage($e->getMessage());
                #$this->logger()->info($e->getMessage());

                return $this->redirect()->toRoute('colaboradores');
            }
            // adicionar mensagem de sucesso
            $this->flashMessenger()->addSuccessMessage("Colaborador deletado com sucesso");
        }

        // redirecionar para action index
        return $this->redirect()->toRoute('colaboradores');
    }

    // Filter Flash Messenger
    private function getFlashMessenger() {
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
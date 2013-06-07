<?php
 
namespace Cliente\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Propel;
 
class EmailsController extends AbstractActionController
{
 
    // GET /clientes
    public function indexAction()
    {
        
        $cliente = \ClienteQuery::create()->find();
       
        return array('message' => $this->getFlashMessenger(),
                    'aCliente'=>$cliente);
    }

    // GET /clientes/novo
    public function novoAction()
    {
        $idcli = (int) $this->params()->fromRoute('idcli', 0);
        $id = (int) $this->params()->fromRoute('id', 0);
        
        if($idcli == ""){
            return $this->redirect()->toRoute('clientes');
        }
       
        $cliente = \ClienteQuery::create()
                ->filterByCoCliente($idcli)
                ->findOne();
        
        return array('message' => $this->getFlashMessenger(),
                    'cliente'=>$cliente,
                    'id'=>$id,
                    'idcli'=>$idcli);
    }
 
    // POST /clientes/adicionar
    public function adicionarAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $postData = $request->getPost()->toArray();
            
            $formularioValido = true;

            if ($formularioValido) {
                try{                 
                    \EmailPeer::gravaEmail($postData);
                }  catch (Exception $e){
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    return $this->redirect()->toRoute('clientes',
                             array('action'=>'detalhes',
                         'id'=>$postData['co_pessoa']));
                }
                
                $this->flashMessenger()->addSuccessMessage("Email adicionado com sucesso");
                                    
                return $this->redirect()->toRoute('clientes',
                             array('action'=>'detalhes',
                         'id'=>$postData['co_pessoa']));
            } else {
                $this->flashMessenger()->addErrorMessage("Erro ao adicionar email");
                return $this->redirect()->toRoute('clientes');
            }
        }
    }
    public function editarAction()
    {
        $co_email = (int) $this->params()->fromRoute('id', 0);
        $co_pessoa = (int) $this->params()->fromRoute('idcli', 0);

        if ($co_email == "") {
            $this->flashMessenger()->addErrorMessage("Email não encotrado");
            return $this->redirect()->toRoute('clientes',array('action'=>'detalhes',
                                            'id'=>$co_pessoa));
        }
        $cliente = \ClienteQuery::create()
                ->filterByCoCliente($co_pessoa)
                ->findOne();

        $oEmail = \EmailQuery::create()
                ->filterByCoEmail($co_email)
                ->findOne();

        return array('co_email' => $co_email,
            'oEmail' => $oEmail,
            'co_email' => $co_email,
            'co_pessoa' => $co_pessoa,
            'cliente' => $cliente,
            'message' => $this->getFlashMessenger());
    }
 
    public function atualizarAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $postData = $request->getPost()->toArray();
            $formularioValido = true;

            if ($formularioValido) {
                try{
                    \EmailPeer::gravaEmail($postData);
                }  catch (Exception $e){
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    return $this->redirect()->toRoute('clientes');
                }
                $this->flashMessenger()->addSuccessMessage("Email editado com sucesso");
                return $this->redirect()->toRoute('clientes', array("action" => "detalhes", "id" => $postData['co_pessoa'],));
            } else {
                $this->flashMessenger()->addErrorMessage("Erro ao editar cliente");
                return $this->redirect()->toRoute('clientes');
            }
        }
    }
    public function deletarAction()
    {
        $co_email = $this->params()->fromRoute('id', 0);
        $idcli = $this->params()->fromRoute('idcli', 0);

        if($co_email != "" && is_numeric($co_email)){
        
                try{
                 $oEmail = \EmailQuery::create()
                         ->filterByCoEmail($co_email)
                         ->findOne();
                 $oEmail->delete();
                 $this->flashMessenger()->addSuccessMessage("Email deletado com sucesso");
                 
                 return $this->redirect()->toRoute('clientes',
                             array('action'=>'detalhes',
                                 'id'=>$idcli));
                 
                }  catch (Exception $e){
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    return $this->redirect()->toRoute('clientes',
                             array('action'=>'detalhes',
                                 'id'=>$idcli));
                }
        }else{
             $this->flashMessenger()->addErrorMessage("Email não encotrado");
        }
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
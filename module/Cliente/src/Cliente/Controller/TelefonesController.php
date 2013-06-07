<?php
 
namespace Cliente\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Propel;
 
class TelefonesController extends AbstractActionController
{
    public function indexAction()
    {
        $cliente = \ClienteQuery::create()->find();
        return array('message' => $this->getFlashMessenger(),
                    'aCliente'=>$cliente);
    }
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
    public function adicionarAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $postData = $request->getPost()->toArray();
            
            $formularioValido = true;

            if ($formularioValido) {
                try{                 
                    \TelefonePeer::gravaTelefone($postData);
                }  catch (Exception $e){
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    return $this->redirect()->toRoute('clientes',
                             array('action'=>'detalhes',
                         'id'=>$postData['co_pessoa']));
                }
                
                $this->flashMessenger()->addSuccessMessage("Telefone adicionado com sucesso");
                                    
                return $this->redirect()->toRoute('clientes',
                             array('action'=>'detalhes',
                         'id'=>$postData['co_pessoa']));
            } else {
                $this->flashMessenger()->addErrorMessage("Erro ao adicionar telefone");
                return $this->redirect()->toRoute('clientes');
            }
        }
    }
    public function editarAction()
    {
        $co_telefone = (int) $this->params()->fromRoute('id', 0);
        $co_pessoa = (int) $this->params()->fromRoute('idcli', 0);

        if ($co_telefone == "") {
            $this->flashMessenger()->addErrorMessage("Telefone não encotrado");
            return $this->redirect()->toRoute('clientes',array('action'=>'detalhes',
                                            'id'=>$co_pessoa));
        }
        $cliente = \ClienteQuery::create()
                ->filterByCoCliente($co_pessoa)
                ->findOne();

        $oTelefone = \TelefoneQuery::create()
                ->filterByCoTelefone($co_telefone)
                ->findOne();

        return array('co_telefone' => $co_telefone,
            'oTelefone' => $oTelefone,
            'co_telefone' => $co_telefone,
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
                    \TelefonePeer::gravaTelefone($postData);
                }  catch (Exception $e){
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    return $this->redirect()->toRoute('clientes');
                }
                $this->flashMessenger()->addSuccessMessage("Telefone editado com sucesso");
                return $this->redirect()->toRoute('clientes', array("action" => "detalhes", 
                    "id" => $postData['co_pessoa'],));
            } else {
                $this->flashMessenger()->addErrorMessage("Erro ao editar cliente");
                return $this->redirect()->toRoute('clientes');
            }
        }
    }
    public function deletarAction()
    {
        $co_telefone = $this->params()->fromRoute('id', 0);
        $idcli = $this->params()->fromRoute('idcli', 0);

        if($co_telefone != "" && is_numeric($co_telefone)){        
                try{
                    
                    $oTelefone = \TelefoneQuery::create()
                            ->filterByCoTelefone($co_telefone)
                            ->findOne();

                    $oTelefone->delete();

                    $this->flashMessenger()->addSuccessMessage("Telefone deletado com sucesso");

                    return $this->redirect()->toRoute('clientes',
                                array('action'=>'detalhes','id'=>$idcli));

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
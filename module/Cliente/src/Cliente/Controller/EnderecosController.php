<?php
 
namespace Cliente\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Propel;
 
class EnderecosController extends AbstractActionController
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
        
                $uf = array("RJ"=>"Rio de Janeiro",
                        "AC"=>"Acre", 
                        "AL"=>"Alagoas", "AM"=>"Amazonas", 
                        "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará",
                        "DF"=>"Distrito Federal","ES"=>"Espírito Santo",
                        "GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso",
                        "MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais",
                        "PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná",
                        "PE"=>"Pernambuco","PI"=>"Piauí",
                        "RN"=>"Rio Grande do Norte","RO"=>"Rondônia",
                        "RS"=>"Rio Grande do Sul","RR"=>"Roraima",
                        "SC"=>"Santa Catarina","SE"=>"Sergipe",
                        "SP"=>"São Paulo","TO"=>"Tocantins");
        
        return array('message' => $this->getFlashMessenger(),
                    'cliente'=>$cliente,
                    'uf'=>$uf,
                    'co_pessoa'=>$idcli);
    }
    public function adicionarAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $postData = $request->getPost()->toArray();
            
            $formularioValido = true;

            if ($formularioValido) {
                try{                 
                    \EnderecoPeer::gravaEndereco($postData);
                }  catch (Exception $e){
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    return $this->redirect()->toRoute('clientes',
                             array('action'=>'detalhes',
                                    'id'=>$postData['co_pessoa']));
                }
                
                $this->flashMessenger()->addSuccessMessage("Endereço adicionado com sucesso");
                                    
                return $this->redirect()->toRoute('clientes',
                             array('action'=>'detalhes',
                                    'id'=>$postData['co_pessoa']));
            } else {
                $this->flashMessenger()->addErrorMessage("Erro ao adicionar endereço");
                return $this->redirect()->toRoute('clientes');
            }
        }
    }
    public function editarAction()
    {
        $co_endereco = (int) $this->params()->fromRoute('id', 0);
        $co_pessoa = (int) $this->params()->fromRoute('idcli', 0);

        if ($co_endereco == "") {
            $this->flashMessenger()->addErrorMessage("Endereço não encotrado");
            return $this->redirect()->toRoute('clientes',
                                      array('action'=>'detalhes',
                                            'id'=>$co_pessoa));
        }
        $cliente = \ClienteQuery::create()
                ->filterByCoCliente($co_pessoa)
                ->findOne();

        $oEndereco = \EnderecoQuery::create()
                ->filterByCoEndereco($co_endereco)
                ->findOne();

           $uf = array("RJ"=>"Rio de Janeiro",
                        "AC"=>"Acre", 
                        "AL"=>"Alagoas", "AM"=>"Amazonas", 
                        "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará",
                        "DF"=>"Distrito Federal","ES"=>"Espírito Santo",
                        "GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso",
                        "MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais",
                        "PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná",
                        "PE"=>"Pernambuco","PI"=>"Piauí",
                        "RN"=>"Rio Grande do Norte","RO"=>"Rondônia",
                        "RS"=>"Rio Grande do Sul","RR"=>"Roraima",
                        "SC"=>"Santa Catarina","SE"=>"Sergipe",
                        "SP"=>"São Paulo","TO"=>"Tocantins");
           
        return array('co_telefone' => $co_endereco,
                    'oEndereco' => $oEndereco,
                    'co_endereco' => $co_endereco,
                    'co_pessoa' => $co_pessoa,
                    'cliente' => $cliente,
                    'uf' => $uf,
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
                    \EnderecoPeer::gravaEndereco($postData);
                }  catch (Exception $e){
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    return $this->redirect()->toRoute('clientes');
                }
                $this->flashMessenger()->addSuccessMessage("Endereço editado com sucesso");
                return $this->redirect()->toRoute('clientes', 
                                             array('action' => "detalhes", 
                                                   'id' => $postData['co_pessoa'],));
            } else {
                $this->flashMessenger()->addErrorMessage("Erro ao editar endereço");
                return $this->redirect()->toRoute('clientes');
            }
        }
    }
    public function deletarAction()
    {
        $co_endereco = $this->params()->fromRoute('id', 0);
        $idcli = $this->params()->fromRoute('idcli', 0);

        if($co_endereco != "" && is_numeric($co_endereco)){        
                try{
                    
                    $oEndereco = \EnderecoQuery::create()
                            ->filterByCoEndereco($co_endereco)
                            ->findOne();

                    $oEndereco->delete();

                    $this->flashMessenger()->addSuccessMessage("Endereço deletado com sucesso");

                    return $this->redirect()->toRoute('clientes',
                                array('action'=>'detalhes','id'=>$idcli));

                }  catch (Exception $e){
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    return $this->redirect()->toRoute('clientes',
                             array('action'=>'detalhes',
                                 'id'=>$idcli));
                }
        }else{
             $this->flashMessenger()->addErrorMessage("Endereço não encotrado");
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
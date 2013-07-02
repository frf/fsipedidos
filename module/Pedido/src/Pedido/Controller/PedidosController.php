<?php

// namespace de localizacao clientesController.php

namespace Pedido\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Propel;

class PedidosController extends AbstractActionController {

    // GET /clientes
    public function indexAction() {

        $oPedido = \PedidoQuery::create()->find();

        return array('message' => $this->getFlashMessenger(),
            'oPedido' => $oPedido);
    }

    // GET /clientes/novo
    public function novoAction() {
        

        $oRepresentadas = \RepresentadaQuery::create()->find();
        $oCliente = \ClienteQuery::create()->find();
        
        return array('id' => $id,
            'representada' => $oRepresentadas,
            'cliente' => $oCliente,
            'message' => $this->getFlashMessenger());
    }
    // GET /clientes/novo
    public function novoProdutoAction() {
        
        $id = (int) $this->params()->fromRoute('id', 0);
        $produto = (int) $this->params()->fromRoute('produto', 0);

        if (!$id) {
            $this->flashMessenger()->addErrorMessage("Pedido não encontrado");
            return $this->redirect()->toRoute('pedidos');
        }
        
        $oPedido = \PedidoQuery::create()
                        ->filterByCoPedido($id)
                        ->findOne();
        if($oPedido){
            $oRepresentada = $oPedido->getRepresentada();
            $countProduto = $oPedido->getRepresentada()->countProdutoRepresentadas();
            if($countProduto){
                $oProduto = $oPedido->getRepresentada()->getProdutoRepresentadas();
            }else{
                $this->flashMessenger()->addErrorMessage("Representada sem produto");
                return $this->redirect()->toRoute('pedidos');
            }
            $oProdutoPedido = null;
            
            if($oPedido->getProdutoPedidos()->count()){
                $oProdutoPedido = $oPedido->getProdutoPedidos();
            }
        }else{
             $this->flashMessenger()->addErrorMessage("Pedido não encontrado");
            return $this->redirect()->toRoute('pedidos');
        }
        
        return array('id' => $id,
            'produtoRepresentada' => $oProduto,
            'oRepresentada' => $oRepresentada,
            'oProdutoPedido' => $oProdutoPedido,
            'pedido' => $oPedido,
            'message' => $this->getFlashMessenger());
    }
    // GET /clientes/novo
    public function novaNotaFiscalAction() {
    
         // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para clientes
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addErrorMessage("Pedido não encotrado");

            // redirecionar para action index
            return $this->redirect()->toRoute('pedidos');
        }

        
        $oPedido = \PedidoQuery::create()
                ->filterByCoPedido($id)
                ->findOne();
      
        if($oPedido){
            $oNotaFiscal = $oPedido->getNotaFiscals();
        }else{
             $this->flashMessenger()->addErrorMessage("Pedido não encontrado");
            return $this->redirect()->toRoute('pedidos');
        }
        
        $oRepresentadas = \RepresentadaQuery::create()
                ->filterByCoRepresentada($oPedido->getCoRepresentada())
                ->findOne();
        
        $oCliente = \ClienteQuery::create()
                ->filterByCoCliente($oPedido->getCoCliente())
                ->findOne();
        
        return array('id' => $id,
            'oPedido' => $oPedido,
            'nomePedido' => "PEDIDO-" . $oPedido->getCodigoPedidoFormatado() . "-" . $oPedido->getDtEmissao('d-m-Y'),
            'oRepresentada' => $oRepresentadas,
            'oCliente' => $oCliente,
            'oNotaFiscal' => $oNotaFiscal,
            'message' => $this->getFlashMessenger());
    }
    
    // POST /clientes/adicionar
    public function adicionarNotaFiscalAction()
    {
        $request = $this->getRequest();
 
        // verifica se a requisição é do tipo post
        if ($request->isPost()) {
            // obter e armazenar valores do post
            $postData = $request->getPost()->toArray();

                try{
                    $mime2ext = array();                    
                    $mime2ext['application/pdf'] = '.pdf'; 
                    $mime2ext['application/msword'] = '.doc'; 
                    $mime2ext['application/vnd.openxmlformats-officedocument.wordprocessingml.document'] = '.docx'; 
                    $mime2ext['application/vnd.openxmlformats-officedocument.wordprocessingml.document'] = '.docx'; 
                    $mime2ext['application/zip'] = '.docx'; 

                    $File = $this->params()->fromFiles('no_file_nota_fiscal');
                    $diretorio = $request->getServer('DOCUMENT_ROOT', false) . "/nota-fiscal";
                   
                    /*
                     * Gravar arquivo
                     */
                    
                    if($File['error'] == 0){
                        // upload arquivo
                        $size = new \Zend\Validator\File\Size(array('max' => '8000000'));                    
                        $size->setMessage("O tamanho máximo permitido para o arquivo é '%max%' mas '%size%' foi detectado");

                        #$extension = new \Zend\Validator\File\Extension(array('pdf','doc', 'xls'));
                        #$extension->setMessage("O arquivo tem uma extensão incorreta");

                        $adapter = new \Zend\File\Transfer\Adapter\Http();
                        $extensao =  $mime2ext[$adapter->getMimeType()];
                       
                        $fileName = md5(date('YmdHis')).$extensao;
                        $adapter->setValidators(array($size), $File['name']);
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
                            $adapter->receive($File['name']);
                            #$this->flashMessenger()->addInfoMessage("Nota fiscal adicionada com sucesso.");
                        }
                    }    
                    $postData['no_file_nota_fiscal'] = $fileName;
                    \PedidoPeer::gravaNotaFiscal($postData);
                   
                }  catch (Exception $e){
                    $this->flashMessenger()->addErrorMessage( $e->getMessage());                    
                    return $this->redirect()->toRoute('pedidos',array('action' => 'nova-nota-fiscal', 'id' =>$postData['co_pedidos']));
                }
                
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Nota fiscal adicionada com sucesso.");
               
                return $this->redirect()->toRoute('pedidos',array('action' => 'nova-nota-fiscal', 'id' =>$postData['co_pedido']));
           }
    }
    public function deletarNotaFiscalAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $pedido = (int) $this->params()->fromRoute('pedido', 0);
        

        // se id = 0 ou não informado redirecione para clientes
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addErrorMessage("Nota fiscal não encontrada.");
        } else {
            // aqui vai a lógica para deletar o contato no banco
            // 1 - solicitar serviço para pegar o model responsável pelo delete
            // 2 - deleta contato

            try {
                \NotaFiscalPeer::deletarNotaFiscal($id);
            } catch (Exception $e) {
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage($e->getMessage());
                #$this->logger()->info($e->getMessage());

                return $this->redirect()->toRoute('pedidos',array('action' => 'nova-nota-fiscal', 'id' =>$pedido));
            }
            // adicionar mensagem de sucesso
            $this->flashMessenger()->addSuccessMessage("Nota fiscal deletada com sucesso");
        }

        return $this->redirect()->toRoute('pedidos',array('action' => 'nova-nota-fiscal', 'id' =>$pedido));
    }
    // GET /clientes/novo
    
    // GET /clientes/novo
    public function novoBoletoAction() {
    
         // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para clientes
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addErrorMessage("Pedido não encotrado");

            // redirecionar para action index
            return $this->redirect()->toRoute('pedidos');
        }

        
        $oPedido = \PedidoQuery::create()
                ->filterByCoPedido($id)
                ->findOne();
      
        if($oPedido){
            $oBoleto = $oPedido->getBoletos();
        }else{
             $this->flashMessenger()->addErrorMessage("Pedido não encontrado");
            return $this->redirect()->toRoute('pedidos');
        }
        
        $oRepresentadas = \RepresentadaQuery::create()
                ->filterByCoRepresentada($oPedido->getCoRepresentada())
                ->findOne();
        
        $oCliente = \ClienteQuery::create()
                ->filterByCoCliente($oPedido->getCoCliente())
                ->findOne();
        
        return array('id' => $id,
            'oPedido' => $oPedido,
            'nomePedido' => "PEDIDO-" . $oPedido->getCodigoPedidoFormatado() . "-" . $oPedido->getDtEmissao('d-m-Y'),
            'oRepresentada' => $oRepresentadas,
            'oCliente' => $oCliente,
            'oBoleto' => $oBoleto,
            'message' => $this->getFlashMessenger());
    }
    
    // POST /clientes/adicionar
    public function adicionarBoletoAction()
    {
        $request = $this->getRequest();
 
        // verifica se a requisição é do tipo post
        if ($request->isPost()) {
            // obter e armazenar valores do post
            $postData = $request->getPost()->toArray();

                try{
                    $mime2ext = array();                    
                    $mime2ext['application/pdf'] = '.pdf'; 

                    $File = $this->params()->fromFiles('no_boleto');
                    $diretorio = $request->getServer('DOCUMENT_ROOT', false) . "/boleto";
                   
                    /*
                     * Gravar arquivo
                     */
                    
                    if($File['error'] == 0){
                        // upload arquivo
                        $size = new \Zend\Validator\File\Size(array('max' => '8000000'));                    
                        $size->setMessage("O tamanho máximo permitido para o arquivo é '%max%' mas '%size%' foi detectado");

                        $extension = new \Zend\Validator\File\Extension(array('pdf'));
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
                            
                            return $this->redirect()->toRoute('pedidos',array('action' => 'novo-boleto', 'id' =>$postData['co_pedido']));
                        } else {
                            $adapter->setDestination($diretorio);
                            $adapter->receive($File['name']);
                            #$this->flashMessenger()->addInfoMessage("Nota fiscal adicionada com sucesso.");
                        }
                    }    
                    $postData['no_boleto'] = $fileName;
                    \PedidoPeer::gravaBoleto($postData);
                   
                }  catch (Exception $e){
                    $this->flashMessenger()->addErrorMessage( $e->getMessage());                    
                    return $this->redirect()->toRoute('pedidos',array('action' => 'novo-boleto', 'id' =>$postData['co_pedido']));
                }
                
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Boleto adicionado com sucesso.");
               
                return $this->redirect()->toRoute('pedidos',array('action' => 'novo-boleto', 'id' =>$postData['co_pedido']));
           }
    }
    public function deletarBoletoAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $pedido = (int) $this->params()->fromRoute('pedido', 0);
        

        // se id = 0 ou não informado redirecione para clientes
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addErrorMessage("Boleto não encontrado.");
        } else {
            // aqui vai a lógica para deletar o contato no banco
            // 1 - solicitar serviço para pegar o model responsável pelo delete
            // 2 - deleta contato

            try {
                \BoletoPeer::deletarBoleto($id);
            } catch (Exception $e) {
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage($e->getMessage());
                #$this->logger()->info($e->getMessage());

                return $this->redirect()->toRoute('pedidos',array('action' => 'novo-boleto', 'id' =>$pedido));
            }
            // adicionar mensagem de sucesso
            $this->flashMessenger()->addSuccessMessage("Boleto deletado com sucesso");
        }

        return $this->redirect()->toRoute('pedidos',array('action' => 'novo-boleto', 'id' =>$pedido));
    }
    // GET /clientes/novo
    public function informacoesAdicionaisAction() {
        
        $id = (int) $this->params()->fromRoute('id', 0);
        $produto = (int) $this->params()->fromRoute('produto', 0);

        if (!$id) {
            $this->flashMessenger()->addErrorMessage("Pedido não encontrado");
            return $this->redirect()->toRoute('pedidos');
        }
        
        $oPedido = \PedidoQuery::create()
                        ->filterByCoPedido($id)
                        ->findOne();
        if($oPedido){
            $oRepresentada = $oPedido->getRepresentada();
            $countProduto = $oPedido->getRepresentada()->countProdutoRepresentadas();
            if($countProduto){
                $oProduto = $oPedido->getRepresentada()->getProdutoRepresentadas();
            }else{
                $this->flashMessenger()->addErrorMessage("Representada sem produto");
                return $this->redirect()->toRoute('pedidos');
            }
            $transportadora = \TransportadoraQuery::create()->find();
        }
        
        return array('id' => $id,
            'produtoRepresentada' => $oProduto,
            'oRepresentada' => $oRepresentada,
            'transportadora' => $transportadora,
            'pedido' => $oPedido,
            'message' => $this->getFlashMessenger());
    }

    public function adicionarProdutoAction() {
       
        // obtém a requisição
        $request = $this->getRequest();

       
        // verifica se a requisição é do tipo post
        if ($request->isPost()) {
            // obter e armazenar valores do post
            $aDados = $request->getPost()->toArray();
            
            $formularioValido = true;

            // verifica se o formulário segue a validação proposta
            if ($formularioValido) {
                // aqui vai a lógica para adicionar os dados à tabela no banco
                // 1 - solicitar serviço para pegar o model responsável pela adição
                // 2 - inserir dados no banco pelo model
                // adicionar mensagem de sucesso
                
                try {

                    $co_pedido = \PedidoPeer::cadastrarProduto($aDados);
                } catch (Exception $e) {
                    // adicionar mensagem de sucesso
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    #$this->logger()->info($e->getMessage());

                    return $this->redirect()->toRoute('pedidos');
                }
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Produto cadastrado com sucesso");

                // redirecionar para action index no controller clientes
                return $this->redirect()->toRoute('pedidos',array('action'=>'novo-produto','id'=>$aDados['co_pedido']));
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao cadastrar produto");

                // redirecionar para action novo no controllers clientes
                return $this->redirect()->toRoute('pedidos',array('action'=>'novo-produto','id'=>$aDados['co_pedido']));
            }
        }
    }

    public function adicionarInformacoesAction() {
       
        $request = $this->getRequest();
       
        if ($request->isPost()) {
            $aDados = $request->getPost()->toArray();
            
            $formularioValido = true;

            if ($formularioValido) {
                try {
                    \PedidoPeer::cadastrarInformacao($aDados);
                     \PedidoPeer::cadastrarTransportadora($aDados);
                } catch (Exception $e) {
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    return $this->redirect()->toRoute('pedidos');
                }
                $this->flashMessenger()->addSuccessMessage("Informações adicionada com sucesso");
                return $this->redirect()->toRoute('pedidos');
            } else {
                $this->flashMessenger()->addErrorMessage("Erro ao adicionar informação");
                return $this->redirect()->toRoute('pedidos');
            }
        }
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

                    $co_pedido = \PedidoPeer::criarPedido($postData);
                } catch (Exception $e) {
                    // adicionar mensagem de sucesso
                    $this->flashMessenger()->addSuccessMessage($e->getMessage());
                    #$this->logger()->info($e->getMessage());

                    return $this->redirect()->toRoute('pedidos');
                }
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Pedido criado com sucesso");

                // redirecionar para action index no controller clientes
                return $this->redirect()->toRoute('pedidos',array('action'=>'novo-produto','id'=>$co_pedido));
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao criar pedido");

                // redirecionar para action novo no controllers clientes
                return $this->redirect()->toRoute('pedidos', array('action' => 'novo'));
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
            $this->flashMessenger()->addErrorMessage("Pedido não encotrado");

            // redirecionar para action index
            return $this->redirect()->toRoute('pedidos');
        }
        $request = $this->getRequest();
      
        
        $oPedido = \PedidoQuery::create()
                ->filterByCoPedido($id)
                ->findOne();
      
        if($oPedido){
            $oRepresentada = $oPedido->getRepresentada();
            $countProduto = $oPedido->getRepresentada()->countProdutoRepresentadas();
            if($countProduto){
                $oProduto = $oPedido->getRepresentada()->getProdutoRepresentadas();
            }else{
                $this->flashMessenger()->addErrorMessage("Representada sem produto");
                return $this->redirect()->toRoute('pedidos');
            }
            $oProdutoPedido = null;
            
            if($oPedido->getProdutoPedidos()->count()){
                
                /*
                 * Atualiza Produtos
                 */
                if ($request->isPost()) {
                    $postData = $request->getPost()->toArray();
                    $id = $postData['id'];
                    $aQntEntregue = $postData['qnt_entregue'];
                    foreach($aQntEntregue as $coProduto => $qtdEntregue){
                        if($qtdEntregue > 0){
                            $oProdPedido = \ProdutoPedidoQuery::create()->filterByCoPedido($id)->filterByCoProduto($coProduto)->findOne();
                            if($qtdEntregue <= $oProdPedido->getQntOriginal()){
                                $oProdPedido->setQntEntregue($qtdEntregue);
                                $oProdPedido->save();
                            }else{
                                $this->flashMessenger()->addErrorMessage("Valor maior que original");
                                return $this->redirect()->toRoute('pedidos',array('action' => 'detalhes', "id" => $id));
                                $oProdPedido->setQntEntregue($oProdPedido->getQntOriginal());
                                $oProdPedido->save();
                            }
                        }else{
                            $this->flashMessenger()->addErrorMessage("Preencha um valor maior que 0");
                            return $this->redirect()->toRoute('pedidos',array('action' => 'detalhes', "id" => $id));
                        }
                    }
                }

                
                $oProdutoPedido = $oPedido->getProdutoPedidos();
            }
        }else{
             $this->flashMessenger()->addErrorMessage("Pedido não encontrado");
            return $this->redirect()->toRoute('pedidos');
        }
        
        $oRepresentadas = \RepresentadaQuery::create()
                ->filterByCoRepresentada($oPedido->getCoRepresentada())
                ->findOne();
        
        $oCliente = \ClienteQuery::create()
                ->filterByCoCliente($oPedido->getCoCliente())
                ->findOne();
        
        $oTransportadora = $oPedido->getTransportadora();
        
        return array('id' => $id,
            'oPedido' => $oPedido,
            'nomePedido' => "PEDIDO-" . $oPedido->getCodigoPedidoFormatado() . "-" . $oPedido->getDtEmissao('d-m-Y'),
            'oRepresentada' => $oRepresentadas,
            'oCliente' => $oCliente,
            'oProdutoPedido' => $oProdutoPedido,
            'oTransportadora' => $oTransportadora,
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
            $this->flashMessenger()->addErrorMessage("Pedido não encotrado");
        } else {
            // aqui vai a lógica para deletar o contato no banco
            // 1 - solicitar serviço para pegar o model responsável pelo delete
            // 2 - deleta contato

            try {
                $oProdutoPedido = \ProdutoPedidoQuery::create()
                        ->filterByCoPedido($id)
                        ->deleteAll();
                $oPessoa = \PedidoQuery::create()
                        ->filterByCoPedido($id)->delete();

            } catch (Exception $e) {
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage($e->getMessage());
                #$this->logger()->info($e->getMessage());

                return $this->redirect()->toRoute('pedidos');
            }
            // adicionar mensagem de sucesso
            $this->flashMessenger()->addSuccessMessage("Pedido deletado com sucesso");
        }

        // redirecionar para action index
        return $this->redirect()->toRoute('pedidos');
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
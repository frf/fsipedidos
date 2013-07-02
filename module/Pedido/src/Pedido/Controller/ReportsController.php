<?php

// namespace de localizacao clientesController.php

namespace Pedido\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use DOMPDFModule\View\Model\PdfModel;
use Propel;

class ReportsController extends AbstractActionController {

    public function pedidoPdfAction()
    {
        $model = new PdfModel();
        $model->setOption('paperSize', 'a4');
        $model->setOption('paperOrientation', 'landscape');
        
 
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
        
        $oRepresentadas = \RepresentadaQuery::create()
                ->filterByCoRepresentada($oPedido->getCoRepresentada())
                ->findOne();
        
        $oCliente = \ClienteQuery::create()
                ->filterByCoCliente($oPedido->getCoCliente())
                ->findOne();
        
        $oPessoa = \PessoaQuery::create()->filterByCoPessoa(CO_PESSOA)->findOne();
        
        //$model->setOption('fileName','pedido-'.$oPedido->getCodigoPedidoFormatado()); // File will be downloaded as monthly-report.pdf).
        // To set view variables
        $model->setVariables(array('id' => $id,
            'noRepresentante'=>$oPessoa->getNoPessoa(),
            'nuPedido'=>$oPedido->getCodigoPedidoFormatado(),
            'dtEmissao'=>$oPedido->getDtEmissao('d/m/Y'),
            'dtEmissaoTitle'=>$oPedido->getDtEmissao('d-m-Y'),
            //'nomePedido'=>"PEDIDO-" . $oPedido->getCodigoPedidoFormatado() . "-" . $oPedido->getDtEmissao('d-m-Y'),
            'dtFaturamento'=>"IMEDIATO",
            'oPedido' => $oPedido,
            'oRepresentada' => $oRepresentadas,
            'oCliente' => $oCliente,
            'oProdutoPedido' => $oProdutoPedido,
            'message' => $this->getFlashMessenger()));
        
        return $model;
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
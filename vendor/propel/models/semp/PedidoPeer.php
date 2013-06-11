<?php



/**
 * Skeleton subclass for performing query and update operations on the 'pedido.pedido' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class PedidoPeer extends BasePedidoPeer
{
     public  static function getValorTotal($co_pedido){
        
        try{
            
            if($co_pedido == ""){
                return false;
            }
            
            $oPedidoProduto = ProdutoPedidoQuery::create()
                    ->filterByCoPedido($co_pedido)
                    ->find();
            $vl_produto = 0;
            
            foreach ($oPedidoProduto as $Produto){
                $vl_produto = $Produto->getQntEntregue() * $Produto->getVlProduto() + $vl_produto;
            }
            
            return number_format($vl_produto, 2, ',', '.');
            
        }  catch (Exception $e){
       
            throw new Exception($e->getMessage());
        }
    }
    
    public static function criarPedido($aDados){
        try{
            $pdo = Propel::getConnection();
            
            $pdo->beginTransaction();
           
            $co_pedido         = $aDados['co_pedido'];
            $co_cliente        = $aDados['co_cliente'];
            $co_representada   = $aDados['co_representada'];
            $co_colaborador    = CO_PESSOA;
            
            $oPedido = PedidoQuery::create()->findOneByCoPedido($co_pedido);
         
            if(!$oPedido){
                $oPedido = new Pedido();
            }
            
            $oPedido->setCoCliente($co_cliente);
            $oPedido->setCoRepresentada($co_representada);
            $oPedido->setCoColaborador($co_colaborador);
            $oPedido->setCoStatus(CO_PEDIDO_ABERTO);
            
            
            $oPedido->save();
            
            $pdo->commit();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
}

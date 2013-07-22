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
     public  static function getValorTotalEntregue($co_pedido){
        
        try{
            
            if($co_pedido == ""){
                return false;
            }
            
            $oPedidoProduto = ProdutoPedidoQuery::create()
                    ->filterByCoPedido($co_pedido)
                    ->find();
            $vl_produto = 0;
            
            foreach ($oPedidoProduto as $Produto){
                $vl_produto = $Produto->getQntEntregue() * $Produto->getVlOriginal();
                
                if($Produto->getVlDesconto() != "" || $Produto->getVlDesconto() > 0){
                    $vl_para_desconto = (($vl_produto * $Produto->getVlDesconto()) / 100);
                }

                if($vl_para_desconto > 0){
                    $vl_produto = $vl_produto - $vl_para_desconto;
                }
                
                
                $vl_total_pedido = $vl_produto + $vl_total_pedido;
            }
            
            
            return number_format($vl_total_pedido, 2, ',', '.');
            
        }  catch (Exception $e){
       
            throw new Exception($e->getMessage());
        }
    }
     public  static function getValorTotalNaoEntregue($co_pedido){
        
        try{
            
            if($co_pedido == ""){
                return false;
            }
            
            $oPedidoProduto = ProdutoPedidoQuery::create()
                    ->filterByCoPedido($co_pedido)
                    ->find();
            $vl_produto = 0;
            
            foreach ($oPedidoProduto as $Produto){
                $vl_produto = $Produto->getQntOriginal() * $Produto->getVlOriginal();
                /*
                 * Validar quando aplicar desconto
                 */
                
                if($Produto->getVlDesconto() != "" || $Produto->getVlDesconto() > 0){
                    $vl_para_desconto = (($vl_produto * $Produto->getVlDesconto()) / 100);
                }

                if($vl_para_desconto > 0){
                #    $vl_total_pedido = $vl_produto - $vl_para_desconto;
                }else{
                #    $vl_total_pedido = $vl_total_pedido + $vl_produto;
                }
                
                 $vl_total_pedido = $vl_total_pedido + $vl_produto;
            }
            
            
            return number_format($vl_total_pedido, 2, ',', '.');
            
        }  catch (Exception $e){
       
            throw new Exception($e->getMessage());
        }
    }
    public function convertMoedaCasaDecimal($moeda){
        return number_format($moeda, 2, ',', '.');
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
            
             return $oPedido->getCoPedido();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
    public static function gravaProduto($aDados){
        try{
            $pdo = Propel::getConnection();
            
            $pdo->beginTransaction();
           
            $co_pedido              = $aDados['co_pedido'];
            $nu_nota_fiscal         = $aDados['nu_nota_fiscal'];
            $no_file_nota_fiscal    = $aDados['no_file_nota_fiscal'];

            
            $oPedido = PedidoQuery::create()->findOneByCoPedido($co_pedido);
         
            if($oPedido){
               
                $oPedido->setCoCliente($co_cliente);
                $oPedido->setCoRepresentada($co_representada);
                $oPedido->setCoColaborador($co_colaborador);
                $oPedido->setCoStatus(CO_PEDIDO_ABERTO);


                $oPedido->save();
            
            }
            
            $pdo->commit();
            
             return $oPedido->getCoPedido();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
    public static function convertMoedaInternacional($moeda){
        return str_replace(",","." , $moeda);
    }
    public static function cadastrarProduto($aDados){
        try{
            $pdo = Propel::getConnection();
            
            $pdo->beginTransaction();
         
            $co_pedido       = $aDados['co_pedido'];
            $co_produto      = $aDados['co_produto'];
            $nu_quantidade   = $aDados['nu_quantidade'];
            $no_unidade      = $aDados['no_unidade'];
            $tp_moeda        = $aDados['tp_moeda'];
            $preco_liquido   = self::convertMoedaInternacional($aDados['preco_liquido']);
            $vl_desconto     = $aDados['vl_desconto'];
            $vl_comissao     = $aDados['vl_comissao'];
            
            $oPedido = PedidoQuery::create()->findOneByCoPedido($co_pedido);
            $oProdutoPedido = ProdutoPedidoQuery::create()
                    ->filterByCoProduto($co_produto)
                    ->filterByCoPedido($co_pedido)
                    ->findOne();
            if($oProdutoPedido){
                throw new Exception("Erro produto já existe!");
            }
            if(!$oPedido){
                throw new Exception("Erro pedido inválido!");
            }
            
            $oProdutoPedido = new ProdutoPedido();
            $oProdutoPedido->setCoPedido($co_pedido);
            $oProdutoPedido->setCoProduto($co_produto);
            $oProdutoPedido->setQntOriginal($nu_quantidade);
            $oProdutoPedido->setTpMoeda($tp_moeda);
            $oProdutoPedido->setVlOriginal($preco_liquido);
            $oProdutoPedido->setVlDesconto($vl_desconto);
            $oProdutoPedido->setVlComissao($vl_comissao);
            $oProdutoPedido->setNoMedida($no_unidade);
            
            
            $oProdutoPedido->save();
            
            $pdo->commit();
            
            
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
    public static function cadastrarInformacao($aDados){
        try{
            $pdo = Propel::getConnection();
            
            $pdo->beginTransaction();
         
            $co_pedido          = $aDados['co_pedido'];
            $ds_informacao      = $aDados['ds_informacao'];
            
            $oPedido = PedidoQuery::create()->findOneByCoPedido($co_pedido);
            
            if(!$oPedido){
                throw new Exception("Erro pedido inválido!");
            }
            
            $oPedido->setDsInformacao($ds_informacao);
            
            $oPedido->save();
            
            $pdo->commit();
            
            
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
    public static function cadastrarTransportadora($aDados){
        try{
            $pdo = Propel::getConnection();
            
            $pdo->beginTransaction();
         
            $co_pedido          = $aDados['co_pedido'];
            $co_transportadora = $aDados['co_transportadora'];
            if($co_transportadora != ""){
                $oPedido = PedidoQuery::create()->findOneByCoPedido($co_pedido);

                if(!$oPedido){
                    throw new Exception("Erro pedido inválido!");
                }

                $oPedido->setCoTransportadora($co_transportadora);

                $oPedido->save();

                $pdo->commit();
            }
            
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
    public static function cadastroProduto($aDados){
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
            
             return $oPedido->getCoPedido();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
    public static function gravaNotaFiscal($aDados){
        $pdo = Propel::getConnection();
        
        try{
            
            $pdo->beginTransaction();
           
            $co_pedido             = $aDados['co_pedido'];
            $nu_nota_fiscal        = $aDados['nu_nota_fiscal'];
            $no_file_nota_fiscal   = $aDados['no_file_nota_fiscal'];
            $co_tipo_nota          = $aDados['co_tipo_nota'];
            
        
            
            $oPedido = PedidoQuery::create()->findOneByCoPedido($co_pedido);
         
            if($oPedido){
                $oNota = new NotaFiscal();

                $oNota->setCoPedido($co_pedido);
                $oNota->setNuNotaFiscal($nu_nota_fiscal);
                $oNota->setNoFileNotaFiscal($no_file_nota_fiscal);
                $oNota->setCoTipoNota($co_tipo_nota);

                $oNota->save();
            
            }
            
            $pdo->commit();
            
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
    public static function gravaBoleto($aDados){
        $pdo = Propel::getConnection();
        
        try{
            
            $pdo->beginTransaction();
           
            $co_pedido             = $aDados['co_pedido'];
            $nu_boleto        = $aDados['nu_boleto'];
            $no_boleto   = $aDados['no_boleto'];
            
        
            
            $oPedido = PedidoQuery::create()->findOneByCoPedido($co_pedido);
         
            if($oPedido){
                $oBoleto = new Boleto();

                $oBoleto->setCoPedido($co_pedido);
                $oBoleto->setNuBoleto($nu_boleto);
                $oBoleto->setNoBoleto($no_boleto);

                $oBoleto->save();
            
            }
            
            $pdo->commit();
            
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
    public static function getNoNotaFiscal($co_tipo_nota){
        
        if(CO_TIPO_NOTA_FISCAL_DEVOLUCAO == $co_tipo_nota){
            return "Nota Fiscal Devolução";
        }
        if(CO_TIPO_NOTA_FISCAL == $co_tipo_nota){
            return "Nota Fiscal";
        }
       
    }
    
}

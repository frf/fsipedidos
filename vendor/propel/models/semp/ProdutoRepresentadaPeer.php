<?php



/**
 * Skeleton subclass for performing query and update operations on the 'representada.produto_representada' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class ProdutoRepresentadaPeer extends BaseProdutoRepresentadaPeer
{
    public  static function gravaProduto($aDados=array()){
        
        try{
            $pdo = Propel::getConnection();
            
            $pdo->beginTransaction();
           /*
            *   co_produto serial NOT NULL,
                cod_produto character varying(10),
                no_produto character varying(200),
                co_representada integer NOT NULL,
                ds_valor character varying(10),
                no_unidade character varying(10),
            */
            
            $co_produto         = $aDados['id'];
            $cod_produto        = $aDados['cod_produto'];
            $no_produto         = $aDados['no_produto'];
            $co_representada    = $aDados['idrep'];
            $ds_valor           = $aDados['ds_valor'];
            $no_unidade         = $aDados['ds_unidade'];
            $no_imagem          = $aDados['no_imagem'];
            $tp_moeda           = $aDados['tp_moeda'];
            $ncm_sh           = $aDados['ncm_sh'];
            
        
            $oProduto = ProdutoRepresentadaQuery::create()
                        ->filterByCoProduto($co_produto)
                        ->findOne();
            
            if(!$oProduto){
                $oProduto = new ProdutoRepresentada();
            }
            
            $oProduto->setCodProduto($cod_produto);
            $oProduto->setNcmSh($ncm_sh);
            $oProduto->setNoProduto($no_produto);
            $oProduto->setCoRepresentada($co_representada);
            $oProduto->setDsValor($ds_valor);
            $oProduto->setNoUnidade($no_unidade);
            $oProduto->setTpMoeda($tp_moeda);
            
            if($no_imagem != ""){
                $oProduto->setNoImagem($no_imagem);
            }
            $oProduto->save();
            
            $oPedidoProduto = ProdutoPedidoQuery::create()->filterByCoProduto($co_produto)->find();
            
            if($oPedidoProduto->count()){
                foreach ($oPedidoProduto as $oPP){
                    $oPP->setNoMedida($no_unidade);
                    $oPP->save();
                }
            }    
            
            $pdo->commit();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
}

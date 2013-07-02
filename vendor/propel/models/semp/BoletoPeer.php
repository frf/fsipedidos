<?php



/**
 * Skeleton subclass for performing query and update operations on the 'pedido.boleto' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class BoletoPeer extends BaseBoletoPeer
{
    public static function deletarBoleto($co_boleto){
        
        $pdo = Propel::getConnection();
        
        try{
            $diretorio = $_SERVER['DOCUMENT_ROOT'] . "/boleto";
            
            $pdo->beginTransaction();

            $oBoleto = \BoletoQuery::create()
                    ->filterByCoBoleto($co_boleto)
                    ->findOne();
            
            if(is_file($diretorio. "/" . $oBoleto->getNoBoleto())){
                unlink($diretorio. "/" . $oBoleto->getNoBoleto());
            }
            
            $oBoleto->delete($pdo);
             
            $pdo->commit();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
                       
    }
}

<?php



/**
 * Skeleton subclass for performing query and update operations on the 'pedido.nota_fiscal' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class NotaFiscalPeer extends BaseNotaFiscalPeer
{
    public static function deletarNotaFiscal($co_nota){
        
        $pdo = Propel::getConnection();
        
        try{
            $diretorio = $_SERVER['DOCUMENT_ROOT'] . "/nota-fiscal";
            
            $pdo->beginTransaction();

            $oNota = \NotaFiscalQuery::create()
                    ->filterByCoNota($co_nota)
                    ->findOne();
            
            if(is_file($diretorio. "/" . $oNota->getNoFileNotaFiscal())){
                unlink($diretorio. "/" . $oNota->getNoFileNotaFiscal());
            }
            
            $oNota->delete($pdo);
             
            $pdo->commit();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
                       
    }
}

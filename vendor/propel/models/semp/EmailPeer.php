<?php



/**
 * Skeleton subclass for performing query and update operations on the 'email' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class EmailPeer extends BaseEmailPeer
{
    public  static function gravaEmail($aDados=array()){
        
        try{
            
                        
            $pdo = Propel::getConnection();
            
            $pdo->beginTransaction();

           
            if($aDados['co_pessoa'] == ""){
                throw new Exception("Código inválido");
            }
            
            $co_pessoa      = $aDados['co_pessoa'];
            $no_email       = $aDados['no_email'];
            $ds_email       = $aDados['ds_email'];
            $co_email       = $aDados['co_email'];
            
           
            $oEmail = EmailQuery::create()->findOneByCoEmail($co_email);
            
            if(!$oEmail){
                $oEmail = new Email();
                $oEmail->setNoEmail($no_email);
                $oEmail->setDsEmail($ds_email);
                $oEmail->setCoPessoa($co_pessoa);
                
                $oEmail->save();
            }else{
               
                $oEmail->setNoEmail($no_email);
                $oEmail->setDsEmail($ds_email);
                $oEmail->setCoPessoa($co_pessoa);
                
                $oEmail->save();
            }
            
            $pdo->commit();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
}

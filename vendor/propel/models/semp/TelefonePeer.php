<?php



/**
 * Skeleton subclass for performing query and update operations on the 'telefone' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class TelefonePeer extends BaseTelefonePeer
{
    
    public  static function gravaTelefone($aDados=array()){
                    
                        
            $pdo = Propel::getConnection();
            
            $pdo->beginTransaction();

        try{
            if($aDados['co_pessoa'] == ""){
                throw new Exception("Código inválido");
            }
            
            $co_pessoa      = $aDados['co_pessoa'];
            $no_telefone    = $aDados['no_telefone'];
            $nu_telefone    = $aDados['nu_telefone'];
            $co_telefone    = $aDados['co_telefone'];
            
            $aTel = explode(" ",trim(str_replace(array('(',')'), "", $nu_telefone)));

            
            $nu_ddd         = $aTel[0];
            $nu_telefone    = $aTel[1];

            $oTelefone = TelefoneQuery::create()
                    ->findOneByCoTelefone($co_telefone);
            
            if(!$oTelefone){
                
                $oTelefone = new Telefone();
                $oTelefone->setNoTelefone($no_telefone);
                $oTelefone->setNuDdi(DDI);
                $oTelefone->setNuDdd($nu_ddd);
                $oTelefone->setNuTelefone($nu_telefone);

            }else{
               
                $oTelefone->setNoTelefone($no_telefone);
                $oTelefone->setNuDdi(DDI);
                $oTelefone->setNuDdd($nu_ddd);
                $oTelefone->setNuTelefone($nu_telefone);
                
            }
            
            $oTelefone->setCoPessoa($co_pessoa);
            $oTelefone->save();
            
            $pdo->commit();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
}

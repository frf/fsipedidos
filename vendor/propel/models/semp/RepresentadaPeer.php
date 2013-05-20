<?php



/**
 * Skeleton subclass for performing query and update operations on the 'representada.representada' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class RepresentadaPeer extends BaseRepresentadaPeer
{
    public  static function gravaRepresentada($aDados=array()){
        
        try{
            $pdo = Propel::getConnection();
            
            $pdo->beginTransaction();
           
            $co_representada    = $aDados['co_representada'];
            $r_social           = $aDados['r_social'];
            $cnpj               = $aDados['cnpj'];
            $no_representada    = $aDados['no_representada'];
            $nu_comissao        = $aDados['nu_comissao'];
            $ds_info_adicionais = $aDados['ds_info_adicionais'];
     
            
            $oPessoa = PessoaQuery::create()->findOneByCoPessoa($co_representada);
            
            if(!$oPessoa){
                
                $oPessoa = new Pessoa();
                $oPessoa->setNoPessoa($no_representada);                
                $oPessoa->setNuCnpj($cnpj);
                
                $oRepresentada = new Representada();
                
                $oRepresentada->setDsRazaoSocial($r_social);
                $oRepresentada->setNuComissao($nu_comissao);
                $oRepresentada->setDsInfoAdicionais($ds_info_adicionais);
               
                
                $oPessoa->setRepresentada($oRepresentada);
                $oPessoa->save();
                
            }else{
                
                
                $oPessoa->setNoPessoa($no_representada);                
                $oPessoa->setNuCnpj($cnpj);
                
                $oRepresentada = $oPessoa->getRepresentada();
                
                $oRepresentada->setDsRazaoSocial($r_social);
                $oRepresentada->setNuComissao($nu_comissao);
                $oRepresentada->setDsInfoAdicionais($ds_info_adicionais);
               
                
                $oPessoa->setRepresentada($oRepresentada);
                $oPessoa->save();
            }
            
            $pdo->commit();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
}

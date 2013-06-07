<?php



/**
 * Skeleton subclass for performing query and update operations on the 'endereco' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class EnderecoPeer extends BaseEnderecoPeer
{
     public  static function gravaEndereco($aDados=array()){
                    
                        
            $pdo = Propel::getConnection();            
            $pdo->beginTransaction();

        try{
            $co_pessoa      = $aDados['co_pessoa'];
           
            if($co_pessoa == ""){
                throw new Exception("Código inválido");
            }
            
            $co_endereco    = $aDados['co_endereco'];
            $tp_endereco    = $aDados['tp_endereco'];
            $no_logradouro  = $aDados['no_logradouro'];
            $nu_endereco    = $aDados['nu_endereco'];
            $no_bairro      = $aDados['no_bairro'];
            $no_cidade      = $aDados['no_cidade'];
            $co_estado      = $aDados['co_estado'];
            $nu_cep         = $aDados['nu_cep'];
            $nu_latitude    = $aDados['nu_latitude'];
            $nu_longitude   = $aDados['nu_longitude'];
            
            $oEndereco = EnderecoQuery::create()
                    ->findOneByCoEndereco($co_endereco);
          
            if(!$oEndereco){ 
                $oEndereco = new Endereco();
            }
            
            $oEndereco->setTpEndereco($tp_endereco);
            $oEndereco->setNoLogradouro($no_logradouro);
            $oEndereco->setNuEndereco($nu_endereco);
            $oEndereco->setNoBairro($no_bairro);
            $oEndereco->setNoMunicipio($no_cidade);
            $oEndereco->setCoEstado($co_estado);
            $oEndereco->setNuCep($nu_cep);
            $oEndereco->setNuLatitude($nu_latitude);
            $oEndereco->setNuLongitude($nu_longitude);
            $oEndereco->setCoPessoa($co_pessoa);
                
            $oEndereco->save();
            
            $pdo->commit();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
}

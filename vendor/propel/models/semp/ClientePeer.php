<?php



/**
 * Skeleton subclass for performing query and update operations on the 'cliente.cliente' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class ClientePeer extends BaseClientePeer
{
    public  static function gravaCliente($aDados=array()){
        
        try{
            $pdo = Propel::getConnection();
            
            $pdo->beginTransaction();
           
            $co_cliente     = $aDados['co_cliente'];
            $pessoa_tipo    = $aDados['pessoa_tipo'];
            $r_social       = $aDados['r_social'];
            $no_cliente     = $aDados['no_cliente'];
            $cnpj           = $aDados['cnpj'];
            $cpf            = $aDados['cpf'];
            $i_estadual     = $aDados['i_estadual'];
            $ramo_atividade = $aDados['ramo_atividade'];
            $dt_criacao     = $aDados['dt_criacao'];
        
            
            $oPessoa = PessoaQuery::create()->findOneByCoPessoa($co_cliente);
            
            if(!$oPessoa){
                $oPessoa = new Pessoa();
                $oPessoa->setNoPessoa($no_cliente);
                
                $oCliente = new Cliente();                
                 
                if($pessoa_tipo == "J"){
                    $oPessoa->setNuCnpj($cnpj);
                    $oCliente->setDsInscricaoEstadual($i_estadual);
                    $oCliente->setDsRazaoSocial($r_social);
                    $oCliente->setDtFundacao($dt_criacao);
                    $oCliente->setDsRamoAtividade($ramo_atividade);
                }
                if($pessoa_tipo == "F"){
                    $oPessoa->setNuCpf($v);
                    $oCliente->setDsRamoAtividade($ramo_atividade);
                }
                
                $oPessoa->setCliente($oCliente);
                $oPessoa->save();
            }else{
               
                $oPessoa->setNoPessoa($no_cliente);
                
                $oCliente = $oPessoa->getCliente();          
                 
                if($pessoa_tipo == "J"){
                    $oPessoa->setNuCnpj($cnpj);
                    $oCliente->setDsInscricaoEstadual($i_estadual);
                    $oCliente->setDsRazaoSocial($r_social);
                    $oCliente->setDtFundacao($dt_criacao);
                    $oCliente->setDsRamoAtividade($ramo_atividade);
                }
                if($pessoa_tipo == "F"){
                    $oPessoa->setNuCpf($v);
                    $oCliente->setDsRamoAtividade($ramo_atividade);
                }
                
                $oPessoa->setCliente($oCliente);
                $oPessoa->save();
            }
            
            $pdo->commit();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
}

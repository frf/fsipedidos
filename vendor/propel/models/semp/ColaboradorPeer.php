<?php



/**
 * Skeleton subclass for performing query and update operations on the 'colaboradores.colaborador' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class ColaboradorPeer extends BaseColaboradorPeer
{
    public  static function gravaColaborador($aDados=array()){
        
        try{
            $pdo = Propel::getConnection();
           
            $pdo->beginTransaction();
           
            $CoColaborador  = $aDados['CoColaborador'];
            $DsEmail        = $aDados['DsEmail'];
            $DsTelefone     = $aDados['DsTelefone'];
            $DsSenha        = $aDados['DsSenha'];
            $NoColaborador  = $aDados['NoColaborador'];        
            $TpAdministrador= $aDados['TpAdministrador'];        
            $aComissao      = $aDados['comissao'];        
            
            $oPessoa = PessoaQuery::create()
                        ->findOneByCoPessoa($CoColaborador);
            
            if(!$oPessoa){
                $oPessoa = new \Pessoa();                
                $oPessoa->setNoPessoa($NoColaborador);
                
                $oColaborador = new \Colaborador();                 
                $oColaborador->setDsEmail($DsEmail);
                $oColaborador->setDsTelefone($DsTelefone);
                $oColaborador->setTpAdministrador($TpAdministrador);
                
                $oUsuario = new \Usuario();
                $oUsuario->setDsLogin($DsEmail);
                $oUsuario->setDsPassword($DsSenha);
                

                /*
                 * Condicao se for administrador
                 */
                if($TpAdministrador){
                    $oUsuario->setCoPerfil(1);
                }else{
                    $oUsuario->setCoPerfil(2);    
                }
               
                $oPessoa->save();
                
                
                $oColaborador->setCoColaborador($oPessoa->getCoPessoa());
                $oColaborador->save();
                
                $oUsuario->setCoPessoa($oPessoa->getCoPessoa());
                $oUsuario->save();
                
                
                /*
                 * Populando Representada Colaborador
                 */
                if(is_array($aComissao)){
                    foreach ($aComissao as $key => $result){
                        if($result != ""){
                            $oRepCol = new RepresentadaColaborador();
                            $oRepCol->setCoColaborador($oPessoa->getCoPessoa());
                            $oRepCol->setCoRepresentada($key);
                            $oRepCol->setNuComissao($result);
                            $oRepCol->save();
                        }
                    }
                }
                
                
            }else{
                
                $oPessoa->setNoPessoa($NoColaborador);
                
                $oColaborador = $oPessoa->getColaborador();        
                 /*
                 * Populando Representada Colaborador
                 */
                
                $aObjRepCol = $oColaborador->getRepresentadaColaboradors();
                $aObjRepCol->delete();
                if(is_array($aComissao)){
                    foreach ($aComissao as $key => $result){
                        if($result != ""){
                            $oRepCol = new RepresentadaColaborador();
                            $oRepCol->setCoColaborador($oColaborador->getCoColaborador());
                            $oRepCol->setCoRepresentada($key);
                            $oRepCol->setNuComissao($result);
                            $oRepCol->save();
                        }
                    }
                }
                $oColaborador->setDsEmail($DsEmail);
                $oColaborador->setDsTelefone($DsTelefone);
                $oColaborador->setTpAdministrador($TpAdministrador);
                
                $aObjUsuario = $oPessoa->getUsuarios();
                
                if(count($aObjUsuario) > 0 ){
                    $oUsuario = $aObjUsuario[0];
                    $oUsuario->setDsLogin($DsEmail);
                    $oUsuario->setDsPassword($DsSenha);
                }else{
                    $oUsuario = new \Usuario();
                    $oUsuario->setDsLogin($DsEmail);
                    $oUsuario->setDsPassword($DsSenha);
                    $oUsuario->setCoPessoa($oColaborador->getCoColaborador());
                    
                    /*
                    * Condicao se for administrador
                    */
                    if($TpAdministrador){
                        $oUsuario->setCoPerfil(1);
                    }else{
                        $oUsuario->setCoPerfil(2);    
                    }
                    
                    $oUsuario->save();
                }
                
                $oPessoa->setColaborador($oColaborador);
                $oPessoa->save();
            }
            
            $pdo->commit();
        }  catch (Exception $e){
            $pdo->rollBack();
            throw new Exception($e->getMessage());
        }
    }
}

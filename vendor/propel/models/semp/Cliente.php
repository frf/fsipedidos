<?php



/**
 * Skeleton subclass for representing a row from the 'cliente.cliente' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class Cliente extends BaseCliente
{
    public function getTipoCliente(){
        if($this->getNuCpf() != ""){
            return "F";
        }
        if($this->getNuCnpj() != ""){
            return "J";
        }    
    }
    public function getNoCliente(){
        if($this->getPessoa()){
            return $this->getPessoa()->getNoPessoa();
        }
    }
    public function getNuCnpj(){
        if($this->getPessoa()){
            return $this->getPessoa()->getNuCnpj();
        }
    }
    public function getNuCpf(){
        if($this->getPessoa()){
            return $this->getPessoa()->getNuCpf();
        }
    }
}

<?php



/**
 * Skeleton subclass for representing a row from the 'representada.representada' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class Representada extends BaseRepresentada
{
    public function getNoRepresentada(){
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

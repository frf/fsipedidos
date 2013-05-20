<?php



/**
 * Skeleton subclass for representing a row from the 'colaboradores.colaborador' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class Colaborador extends BaseColaborador
{
        public function getNoColaborador() {
            if($this->getPessoa()){
                return $this->getPessoa()->getNoPessoa();
            }
        }
        public function getTipoPessoa(){
            if($this->getPerfil()){
                return $this->getPerfil()->getNoPerfil();
            }
        }
}

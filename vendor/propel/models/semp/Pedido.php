<?php



/**
 * Skeleton subclass for representing a row from the 'pedido.pedido' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class Pedido extends BasePedido
{
    public function getNoRepresentada(){
        if($this->getRepresentada()){
            return $this->getRepresentada()->getNoRepresentada();
        }
    }
    public function getNoCliente(){
        if($this->getCliente()){
            return $this->getCliente()->getNoCliente();
        }
    }
    public function getNoStatus(){
        if($this->getPedidoStatus()){
            return $this->getPedidoStatus()->getNoStatus();
        }
    }
    public function getNoColaborador(){
        if($this->getColaborador()){
            return $this->getColaborador()->getNoColaborador(); 
        }
    }
}

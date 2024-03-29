<?php



/**
 * Skeleton subclass for representing a row from the 'pedido.produto_pedido' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class ProdutoPedido extends BaseProdutoPedido
{
    public function getNoProduto(){
        if($this->getProdutoRepresentada()){
            return $this->getProdutoRepresentada()->getNoProduto();
        }
        
    }
    public function getNoMoeda(){ 
        if($this->getMoeda()){
            return $this->getMoeda()->getNoMoeda();
        }
    }
    public function getTotal(){
        return $this->getQntOriginal() * $this->getVlOriginal();
    }

    public function getTotalEntregue(){
	if($this->getQntEntregue()  > 0){
	        return $this->getQntEntregue() * $this->getVlOriginal();
	}else{
		return 0;
	}
    }
    public function getVlComissao() {
        if(parent::getVlComissao() == ""){
            return "0";
        }else{
            return parent::getVlComissao();
        }
    }
    public function getVlDesconto() {
        if(parent::getVlDesconto() == ""){
            return "0";
        }else{
            return parent::getVlDesconto();
        }
    }
}

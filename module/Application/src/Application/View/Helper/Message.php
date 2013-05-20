<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Application\View\Helper;
use Zend\View\Helper\AbstractHelper;
 
class Message extends AbstractHelper
{
    public function __invoke($view)
    {
        if(isset($view['alert-error'])){
            echo '<div class="alert alert-error">
              <button class="close" data-dismiss="alert">×</button>
              <strong>Error! </strong> '.$view['alert-error'].'</div>';
        }
        if(isset($view['alert-success'])){
            echo '<div class="alert alert-success">
              <button class="close" data-dismiss="alert">×</button>
              <strong>Sucesso! </strong> '.$view['alert-success'].'</div>';
        }
        if(isset($view['alert-info'])){
            echo '<div class="alert alert-info">
              <button class="close" data-dismiss="alert">×</button>
              <strong>Informação! </strong> '.$view['alert-info'].'</div>';
        }
    }
    
}
?>

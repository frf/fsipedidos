<?php

namespace Propel;

class Module
{
    
    public function init(){
        \Propel::init(realpath(dirname(__FILE__) . '/../../').'/vendor/propel/configs/semp-conf.php');
    }    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                realpath(dirname(__FILE__) . '/../../') . '/vendor/propel/models/autoload_classmap.php'            
            )
        );
    }
    public function getConfig()
    {
        return include realpath(dirname(__FILE__) . '/../../') . '/vendor/propel/configs/module.config.php';
    }
 }
?>

<?php

namespace Propel;

class Module
{
    
    public function init(){
        \Propel::init(__DIR__.'/configs/semp-conf.php');
    }    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
                __DIR__ . '/models/autoload_classmap.php'            
            )
        );
    }
    public function getConfig()
    {
        return include __DIR__ . '/configs/module.config.php';
    }
 }
?>

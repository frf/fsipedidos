<?php

# namespace no qual se encontra Module.php
namespace Pedido;
use Zend\ModuleManager\ModuleManager;

class Module
{

     public function init(ModuleManager $moduleManager){
       
      $sharedEvents = $moduleManager->getEventManager()->getSharedManager();            
            $sharedEvents->attach(__NAMESPACE__,'dispatch',function($e){
                $controller = $e->getTarget();
                $controller->layout('layout/representante');
            });          
    }
    
    # include de arquivo para outras configuracoes
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    # autoloader para namespaces
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}
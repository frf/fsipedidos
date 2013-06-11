<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\ModuleManager;
use Zend\Authentication\Storage;
use Zend\Authentication\AuthenticationService;
use Zend\Session\Container;

class Module {

    public function init(ModuleManager $moduleManager) {

        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
                    $controller = $e->getTarget();

                    $controller = $e->getTarget();
                    if ($controller instanceof Controller\AuthController) {
                        $controller->layout('layout/login');
                    } else {
                        $controller->layout('layout/representante');
                    }
                });


        define("TITULO_SISTEMA", "FSI Pedidos");
        define("CO_EMPRESA", 1);
        define("VERSAO", "1.0");
        define("DDI", "55");
        define("MAP_ENDERECO", false);
        define("COTACAO_DOLLAR", '2');
        
        
        define("CO_PEDIDO_ABERTO", 1);
        define("CO_PEDIDO_PENDENTE_PRODUTO", 2);
        define("CO_PEDIDO_PENDENTE_ENTREGA_PARCIAL", 3);
        define("CO_PEDIDO_PENDENTE_CADASTRO_CLIENTE", 4);
        define("CO_PEDIDO_FECHADO", 5);
        define("CO_PEDIDO_FATURADO", 6);
        define("CO_PEDIDO_CANCELADO", 7);
        
        
        $session = new Container('base');
        $oPessoa = $session->offsetGet('user');
        
        define("CO_PESSOA", $oPessoa->co_pessoa);
        
        
    }

    /**
     * Executada no bootstrap do módulo
     * 
     * @param MvcEvent $e
     */
    public function onBootstrap($e) {
        /** @var \Zend\ModuleManager\ModuleManager $moduleManager */
        $moduleManager = $e->getApplication()->getServiceManager()->get('modulemanager');
        /** @var \Zend\EventManager\SharedEventManager $sharedEvents */
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();

        //adiciona eventos ao módulo
        $sharedEvents->attach('Zend\Mvc\Controller\AbstractActionController', 
                \Zend\Mvc\MvcEvent::EVENT_DISPATCH, array($this, 'mvcPreDispatch'), 100);
        
    }

    /**
     * Verifica se precisa fazer a autorização do acesso
     * @param  MvcEvent $event Evento
     * @return boolean
     */
    public function mvcPreDispatch($event) {
        $di             = $event->getTarget()->getServiceLocator();
        $routeMatch     = $event->getRouteMatch();
        $moduleName     = $routeMatch->getParam('module');
        $controllerName = $routeMatch->getParam('controller');
       
        if ($controllerName != 'Application\Controller\Auth') {
            $authService = $di->get('Application\Service\Auth');
            if (!$authService->authorize()) {
                $redirect = $event->getTarget()->redirect();
                $redirect->toUrl('/auth');
            }
        }
        return true;
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}

<?php
 
return array(
    # definir controllers
    'controllers' => array(
        'invokables' => array(
            'ComissoesController' => 'Comissao\Controller\ComissoesController',
        ),
    ),
    
    # definir rotas
    'router' => array(
        'routes' => array(
            'comissoes' => array(
                'type'      => 'segment',
                'options'   => array(
                    'route'    => '/comissoes[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'ComissoesController',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    # definir gerenciador de servicos
    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    
    # definir layouts, erros, exceptions, doctype base
    'view_manager' => array(
        'display_not_found_reason'  => true,
        'display_exceptions'        => true,
        'doctype'                   => 'HTML5',
        'not_found_template'        => 'error/404',
        'exception_template'        => 'error/index',
        'template_map'              => array(
            'layout/layout'         => __DIR__ . '/../view/layout/layout.phtml',
            'comissoes/home/index'    => __DIR__ . '/../view/comissoes/comissao/index.phtml',
            'error/404'             => __DIR__ . '/../view/error/404.phtml',
            'error/index'           => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
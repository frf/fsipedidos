<?php

// module/Admin/conﬁg/module.config.php:
return array(
    'controllers' => array( //add module controllers
        'invokables' => array(
            'Representada\Controller\Representada' => 'Representada\Controller\RepresentadasController',
            'Representada\Controller\Produto' => 'Representada\Controller\ProdutosController'                  
        ),
    ),
 // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'representadas' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/representadas[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Representada\Controller\Representada',
                        'action'     => 'index',
                    ),
                ),
            ),
            'produtos' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/produtos[/:action]/representada[/:idrep]/produto[/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'idrep'     => '[0-9]+',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Representada\Controller\Produto',
                        'action'     => 'novo',
                    ),
                ),
            ),
            'produto' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/produto[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Representada\Controller\Produto',
                        'action'     => 'produto',
                    ),
                ),
            )
       )
    ),
    'view_manager' => array( //the module can have a specific layout
        'template_path_stack' => array(
            'application' => __DIR__ . '/../view',
        ),
    ),
);
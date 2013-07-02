<?php

return array(
    # definir controllers
    'controllers' => array(
        'invokables' => array(
            'Pedido\Controller\PedidosController' => 'Pedido\Controller\PedidosController',
            'Pedido\Controller\ReportsController' => 'Pedido\Controller\ReportsController',
        ),
    ),
    # definir rotas
    'router' => array(
        'routes' => array(
            'pedidos' => array(
                'type'      => 'segment',
                'options'   => array(
                    'route'    => '/pedidos[/:action][/:id][/:produto]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                        'produto'=> '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Pedido\Controller\PedidosController',
                        'action'     => 'index',
                    ),
                ),
            ),
            'nota' => array(
                'type'      => 'segment',
                'options'   => array(
                    'route'    => '/nota[/:action][/:id][/:pedido]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                        'pedido'=>  '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Pedido\Controller\PedidosController',
                        'action'     => 'index',
                    ),
                ),
            ),
            'boleto' => array(
                'type'      => 'segment',
                'options'   => array(
                    'route'    => '/boleto[/:action][/:id][/:pedido]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                        'pedido'=>  '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Pedido\Controller\PedidosController',
                        'action'     => 'index',
                    ),
                ),
            ),
            'report' => array(
                'type'      => 'segment',
                'options'   => array(
                    'route'    => '/report/pedido[/:action][/:id][/:nome]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                        'nome'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Pedido\Controller\ReportsController',
                        'action'     => 'pedido-pdf',
                    ),
                ),
            ),
        ),
    ),    
    # definir layouts, erros, exceptions, doctype base
    'view_manager' => array(       
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
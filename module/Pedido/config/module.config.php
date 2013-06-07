<?php

return array(
    # definir controllers
    'controllers' => array(
        'invokables' => array(
            'Pedido\Controller\PedidosController' => 'Pedido\Controller\PedidosController',
        ),
    ),
    # definir rotas
    'router' => array(
        'routes' => array(
            'pedidos' => array(
                'type'      => 'segment',
                'options'   => array(
                    'route'    => '/pedidos[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Pedido\Controller\PedidosController',
                        'action'     => 'index',
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
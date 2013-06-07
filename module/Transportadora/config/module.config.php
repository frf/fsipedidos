<?php
 
return array(
    # definir controllers
    'controllers' => array(
        'invokables' => array(
            'Transportadora\Controller\TransportadorasController' => 'Transportadora\Controller\TransportadorasController',
        ),
    ),    
    # definir rotas
    'router' => array(
        'routes' => array(
            'transportadoras' => array(
                'type'      => 'segment',
                'options'   => array(
                    'route'    => '/transportadoras[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Transportadora\Controller\TransportadorasController',
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
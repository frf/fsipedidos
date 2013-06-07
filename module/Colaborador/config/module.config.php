<?php

return array(
    # definir controllers
    'controllers' => array(
        'invokables' => array(
            'Colaborador\Controller\ColaboradoresController' => 'Colaborador\Controller\ColaboradoresController',
        ),
    ),
    # definir rotas
    'router' => array(
        'routes' => array(
            'colaboradores' => array(
                'type'      => 'segment',
                'options'   => array(
                    'route'    => '/colaboradores[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Colaborador\Controller\ColaboradoresController',
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
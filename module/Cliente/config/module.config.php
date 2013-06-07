<?php
 
return array(
    # definir controllers
    'controllers' => array(
        'invokables' => array(
            'Cliente\Controller\ClientesController' => 'Cliente\Controller\ClientesController',
            'Cliente\Controller\Endereco' => 'Cliente\Controller\EnderecosController',
            'Cliente\Controller\Telefone' => 'Cliente\Controller\TelefonesController',
            'Cliente\Controller\Email' => 'Cliente\Controller\EmailsController',
        ),
    ),    
    # definir rotas
    'router' => array(
        'routes' => array(
            'clientes' => array(
                'type'      => 'segment',
                'options'   => array(
                    'route'    => '/clientes[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Cliente\Controller\ClientesController',
                        'action'     => 'index',
                    ),
                ),
            ),
            'enderecos' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/enderecos[/:action]/cliente[/:idcli]/endereco[/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'idcli'     => '[0-9]+',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Cliente\Controller\Endereco',
                        'action'     => 'novo',
                    ),
                ),                
            ),
            'telefones' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/telefones[/:action]/cliente[/:idcli]/telefone[/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'idcli'     => '[0-9]+',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Cliente\Controller\Telefone',
                        'action'     => 'novo',
                    ),
                ),
            ),
                'emails' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/emails[/:action]/cliente[/:idcli]/email[/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'idcli'     => '[0-9]+',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Cliente\Controller\Email',
                        'action'     => 'novo',
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
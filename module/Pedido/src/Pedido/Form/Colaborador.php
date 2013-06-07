<?php
namespace Colaborador\Form;

use Zend\Form\Form;

class Colaborador extends Form
{
    public function __construct()
    {
        parent::__construct('colaborador');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '/colaboradores/atualizar');
        $this->setAttribute('class','form-horizontal');
        
        
        $this->add(array(
            'name' => 'CoColaborador',
            'attributes' => array(
                'type'  => 'hidden'
            )
        ));
        $this->add(array(
            'name' => 'NoPessoa',
            'attributes' => array(
                'type'  => 'text',
                'placeholder'=>'Nome Colaborador',
            )
        ));
        
        $this->add(array(
            'name' => 'DsEmail',
            'attributes' => array(
                'type'  => 'text',
                'placeholder'=>'E-Mail',
            )
        ));
        
        $this->add(array(
            'name' => 'NoLogin',
            'attributes' => array(
                'type'  => 'text',
                'placeholder'=>'Login de Acesso',
            )
        ));
        
        $this->add(array(
            'name' => 'DsSenha',
            'attributes' => array(
                'type'  => 'password',
                'placeholder'  => 'Senha de Acesso',
            )
        ));
        $this->add(array(
            'name' => 'TpAdministrador',
            'type' => 'Zend\Form\Element\Checkbox',
            'options' => array(
                'checked_value' => true,
                'unchecked_value' => false,
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Entrar',
                'id' => 'submitbutton',
            ),
        ));
    }
}
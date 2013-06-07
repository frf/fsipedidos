<?php
namespace Application\Form;

use Zend\Form\Form;

class Login extends Form
{
    public function __construct()
    {
        parent::__construct('login');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '/auth/login');
        $this->setAttribute("class", "form-vertical");
        $this->setAttribute("id", "loginform");
        
        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Login'
            ),
            'options' => array(
                'label' => 'Username',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type'  => 'password',
                'placeholder' => 'Senha'
            ),
            'options' => array(
                'label' => 'Password',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Entrar',
                'id' => 'submitbutton',
                'class'=>'btn btn-success'
            ),
        ));
    }
}
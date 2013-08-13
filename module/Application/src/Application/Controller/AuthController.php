<?php

namespace Application\Controller;

use Zend\View\Model\ViewModel;
use Application\Controller\ActionController;
use Application\Form\Login;
use Zend\Mail;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

/**
 * Controlador que gerencia os posts
 * 
 * @category Admin
 * @package Controller
 * @author  Elton Minetto<eminetto@coderockr.com>
 */
class AuthController extends ActionController {

    /**
     * Mostra o formulário de login
     * @return void
     */
    public function indexAction() {

        $form = new Login();
        return new ViewModel(array(
            'form' => $form,'message' => $this->getFlashMessenger()
        ));
    }

    /**
     * Faz o login do usuário
     * @return void
     */
    public function loginAction() {
        
        $request    = $this->getRequest();
        $data       = $request->getPost();
         
        if (!$request->isPost()) {
            //throw new \Exception('Acesso inválido');
            $this->flashMessenger()->addErrorMessage("Acesso inválido");
            return $this->redirect()->toUrl('/');
        }

        if($data['username'] == "" || $data['password'] == ""){
            //throw new \Exception('Usuário ou senha inválido');
            $this->flashMessenger()->addErrorMessage("Usuário ou senha inválido");
            return $this->redirect()->toUrl('/');
        }
        
        
            $service = $this->getService('Application\Service\Auth');

            $auth = $service->authenticate(
                    array('username' => $data['username'], 
                        'password' => $data['password'])
            );

        if(!$auth){
            //throw new \Exception('Usuário ou senha inválido');
            $this->flashMessenger()->addErrorMessage("Usuário ou senha inválido");
            return $this->redirect()->toUrl('/');
        }
        
        return $this->redirect()->toUrl('/');
       
    }

    /**
     * Faz o logout do usuário
     * @return void
     */
    public function logoutAction() {
        $service = $this->getService('Application\Service\Auth');
        $auth = $service->logout();

        return $this->redirect()->toUrl('/');
    }

    /**
     * Faz o logout do usuário
     * @return void
     */
    public function recoverAction() {

        $request    = $this->getRequest();
        $data       = $request->getPost();
      
        $ds_email = $data['ds_email'];
        
        $oColaborador = \ColaboradorQuery::create()
                        ->filterByDsEmail($ds_email)
                        ->findOne();
        
        
        if(!$oColaborador){
              //throw new \Exception('Acesso inválido');
            $this->flashMessenger()->addErrorMessage("Email inválido");
            return $this->redirect()->toUrl('/');
        }else{
                $to     = $oColaborador->getDsEmail();
                $nome   = $oColaborador->getNoColaborador();
     
                $oUsuario = \UsuarioQuery::create()
                            ->filterByCoPessoa($oColaborador->getCoColaborador())
                            ->findOne();
                $senha = $oUsuario->getDsPassword();
                
                $options = new SmtpOptions( array(
                    "name" => "gmail",
                    "host" => "smtp.gmail.com",
                    "port" => 587,
                    "connection_class" => "plain",
                    "connection_config" => array( "username" => "contato@fsitecnologia.com.br",
                                                    "password" => "ch4ng3m3",
                     "ssl" => "tls" )
                ) );
                
                $strText = "Ola $nome, <br><br><br> ";
                $strText .= "Conforme solicitado segue a sua senha de acesso ao FSi Pedidos <br>";
                $strText .= "Senha: <b>$senha</b> <br><br><br><br><br>";
                $strText .= "Atenção esta é uma mensagem automática caso ainda esteja com problemas entre em contato com suporte@fsitecnologia.com.br.";
                $strText .= "<br><br><br> Atenciosamente FSi";
                
                $html = new \Zend\Mime\Part($strText);
                $html->type = \Zend\Mime\Mime::TYPE_HTML;
                $html->disposition = \Zend\Mime\Mime::DISPOSITION_INLINE;
                $html->encoding = \Zend\Mime\Mime::ENCODING_QUOTEDPRINTABLE;
                $html->charset = 'UTF-8';

                $body = new \Zend\Mime\Message();
                $body->addPart($html);

                $mail = new Mail\Message();
                $mail->setBody($body);
                $mail->setFrom("contato@fsitecnologia.com.br", 'Contato FSI Tecnologia');
                $mail->addTo($to, $nome);

                $mail->setSubject("Recuperação de senha");

                $transport = new SmtpTransport();
                $transport->setOptions( $options );
                $transport->send($mail);
            
            
            
        }
        
        if (!$request->isPost()) {
            //throw new \Exception('Acesso inválido');
            $this->flashMessenger()->addErrorMessage("Acesso inválido");
            return $this->redirect()->toUrl('/');
        }
        
        return $this->redirect()->toUrl('/auth');
    }
    
     // Filter Flash Messenger
    private function getFlashMessenger()
    {
        $messenger = array();
        $flashMessenger = $this->flashMessenger();

        if ($flashMessenger->hasSuccessMessages())
            $messenger['alert-success'] = array_shift($flashMessenger->getSuccessMessages());

        if ($flashMessenger->hasErrorMessages())
            $messenger['alert-error'] = array_shift($flashMessenger->getErrorMessages());
        
        if ($flashMessenger->hasInfoMessages())
            $messenger['alert-info'] = array_shift($flashMessenger->getInfoMessages());

        return $messenger;
    }

}

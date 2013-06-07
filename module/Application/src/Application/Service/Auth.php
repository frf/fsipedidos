<?php

namespace Application\Service;

use Application\Service\Service;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Db\Sql\Select;

/**
 * Serviço responsável pela autenticação da aplicação
 * 
 * @category Admin
 * @package Service
 * @author  Elton Minetto<eminetto@coderockr.com>
 */
class Auth extends Service {

    /**
     * Adapter usado para a autenticação
     * @var Zend\Db\Adapter\Adapter
     */
    private $dbAdapter;

    /**
     * Construtor da classe
     *
     * @return void
     */
    public function __construct($dbAdapter = null) {
        $this->dbAdapter = $dbAdapter;
    }

    /**
     * Faz a autenticação dos usuários
     * 
     * @param array $params
     * @return array
     */
    public function authenticate($params) {

        $password = $params['password'];
        $username = $params['username'];

        $auth = new AuthenticationService();
        $authAdapter = new AuthAdapter($this->dbAdapter);

        $authAdapter
                ->setTableName('usuario')
                ->setIdentityColumn('ds_login')
                ->setCredentialColumn('ds_password')
                ->setIdentity($username)
                ->setCredential($password);

        $result = $auth->authenticate($authAdapter);

        
        if (!$result->isValid()) {
            return false;
        }

        $data = $authAdapter->getResultRowObject();

        //salva o user na sessão
        $session = $this->getServiceManager()->get('Session');
        $session->offsetSet('user', $data = $authAdapter->getResultRowObject());

        $oUsuario = \UsuarioQuery::create()
                ->filterByCoUsuario($data->co_usuario)
                ->findOne();
        $oUsuario->setDtUltimoLogin(date('Y-m-d H:i:s'));
        $oUsuario->save();

        return true;
    }

    /**
     * Faz o logout do sistema
     *
     * @return void
     */
    public function logout() {
        $auth = new AuthenticationService();
        $session = $this->getServiceManager()->get('Session');
        $session->offsetUnset('user');
        $auth->clearIdentity();
        return true;
    }

    /**
     * Faz a autorização do usuário para acessar o recurso
     * @return boolean
     */
    public function authorize() {
        $auth = new AuthenticationService();
        if ($auth->hasIdentity()) {
            return true;
        }
        return false;
    }

}
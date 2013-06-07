<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Controller\ActionController;

class IndexController extends ActionController {

    public function indexAction() {

       
        #$user = new \Application\Entity\User();
        #$user->setFullName('Marco Pivetta');

        #$objectManager->persist($user);
        #$objectManager->flush();

        #die(var_dump($this->getEvent()->getName())); // yes, I'm lazy

        return new ViewModel();
    }
    public function testAction() {

       
        #$user = new \Application\Entity\User();
        #$user->setFullName('Marco Pivetta');

        #$objectManager->persist($user);
        #$objectManager->flush();

        #die(var_dump($this->getEvent()->getName())); // yes, I'm lazy

        return new ViewModel();
    }

}

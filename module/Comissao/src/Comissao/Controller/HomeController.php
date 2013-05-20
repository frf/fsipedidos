<?php
 
# namespace de localizacao HomeController.php
namespace Comissao\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
 
class HomeController extends AbstractActionController
{
 
    # action index
    public function indexAction()
    {
        return new ViewModel();
    }
 
}
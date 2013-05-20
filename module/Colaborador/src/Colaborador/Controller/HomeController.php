<?php
 
# namespace de localizacao HomeController.php
namespace Cliente\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
 
class HomeController extends AbstractActionController
{
 
    # action index
    public function indexAction()
    {
        
        echo "IJIJIJ";
        exit;
        return new ViewModel();
    }
 
}
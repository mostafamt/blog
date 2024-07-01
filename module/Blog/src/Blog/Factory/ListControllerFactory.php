<?php
namespace Blog\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Blog\Controller\ListController;

class ListControllerFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $postService = $realServiceLocator->get('Blog\Service\PostServiceInterface');
        
        return new ListController($postService);
    }
}


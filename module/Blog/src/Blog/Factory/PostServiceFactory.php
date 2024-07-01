<?php
namespace Blog\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Blog\Service\PostService;

class PostServiceFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PostService(
            $serviceLocator->get('Blog\Mapper\PostMapperInterface')
        );
    }
}


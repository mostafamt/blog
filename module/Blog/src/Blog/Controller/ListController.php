<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Blog for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Blog\Service\PostServiceInterface;
use Zend\View\Model\ViewModel;

class ListController extends AbstractActionController
{
    protected $postService;
    
    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }
    
    public function indexAction()
    {
        $posts = $this->postService->findAllPosts();
        
        return new ViewModel(array(
            'posts' => $posts
        ));
    }
}

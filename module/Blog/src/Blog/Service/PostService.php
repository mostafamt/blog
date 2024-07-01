<?php
namespace Blog\Service;

use Blog\Mapper\PostMapperInterface;

class PostService implements PostServiceInterface
{
    protected $postMapper;
    
    public function __construct(PostMapperInterface $postMapper)
    {
        $this->postMapper = $postMapper;
    }
    
    public function findAllPosts()
    {
        $this->postMapper->findAll();
    }
    
    public function findPost($id)
    {
        $this->postMapper->find($id);
    }
}


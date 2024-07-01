<?php
namespace Blog\Mapper;

interface PostMapperInterface
{
    public function find($id);
    
    public function findAll();
}


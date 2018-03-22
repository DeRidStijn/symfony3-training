<?php

namespace AppBundle\Service;
use Doctrine\ORM\EntityManagerInterface;

class CommentpostService
{
    protected $repository;
    protected $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository('AppBundle:Commentpost');
        $this->entityManager = $entityManager;
    }
    public function fetchAllPosts()
    {
        return $this->repository->findAll();
    }
}
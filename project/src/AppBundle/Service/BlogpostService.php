<?php

namespace AppBundle\Service;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Blogpost;
class BlogpostService
{
    protected $repository;
    protected $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository('AppBundle:Blogpost');
        $this->entityManager = $entityManager;
    }
    public function fetchAllPosts()
    {
        return $this->repository->findAll();
    }
    public function persist(Blogpost $blogpost)
    {
        $this->entityManager->persist($blogpost);
        $this->entityManager->flush();
    }
    public function flush()
    {
        $this->entityManager->flush();
    }
}
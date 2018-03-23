<?php
namespace AppBundle\Entity;
use AppBundle\Entity\Blogpost;
use AppBundle\Entity\Commentpost;
use AppBundle\Service\BlogpostService;
use PHPunit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;

class BlogpostEntityTest extends TestCase
{
    private $blogpost;
    private $repository;
    private $blogpostservice;
    private $em;

    public function setUp()
   {
       $this->blogpost = new BlogPost();
       $this->repository = $this->prophesize(BlogPostRepository::class);
       $this->em = $this->prophesize(EntityManagerInterface::class);
       $this->em->getRepository(Argument::exact('AppBundle:BlogPost'))->willReturn($this->repository->reveal());
       $this->blogpostservice = new BlogpostService($this->em->reveal());
   }

   public function testFetchAllReturnsCorrectValue()
   {
       $result = [
           new BlogPost(),
           new Blogpost(),
       ];
       $this->repository->findAll()->willReturn($result);
       $testResult = $this->blogpostservice->fetchAll();

       $this->assertIntenalType('array', $testresult);
   }
}
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentpost
 *
 * @ORM\Table(name="commentpost")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentpostRepository")
 */
class Commentpost
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Blogpost
     * 
     * @ORM\ManyToOne(targetEntity="BlogPost", inversedBy="comments")
     * @ORM\JoinColumn(name="blogpost_id", referencedColumnName="id", onDelete="CASCADE")
     * 
     */
    private $blogpost;

    /** 
     * Set blogpost
     * 
     * @return Blogpost
     */
    public function setBlogpost($blogpost)
    {
        $this->blogpost = $blogpost;
        return $this;
    }

    /**
     * Get Blogpost
     * 
     * @return Blogpost
     */
    public function getBlogpost()
    {
        return $this->blogpost;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="comment_date", type="datetime" )
     */
    private $commentDate;

    public function __construct()
    {   
        $this->commentDate = new \DateTime('now');
    }
    /**
     * Get commentDate
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }
    /**
     * Set commentDate
     * @param \DateTime $commentDate
     * @return Commentpost
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
        return $this;
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Commentpost
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Commentpost
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}


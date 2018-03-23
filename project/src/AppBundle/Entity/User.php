<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface; 

/**
 * User
 * 
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */

 class User implements UserInterface, \Serializable
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
    * @var string
    * 
    * @ORM\Column(name="username", type="string", length=255, unique=true)
    */
    private $username;

    /**
    * @var string 
    *
    * @ORM\Column(name="password", type="string", length=64)
    */
    private $password;

    /**
     * @var 
     * 
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    public function getId()
    {
        return $this->id;
    }
    public function setUsername($username)
    {
        $this->name = $username;
        return $this;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function setPassword($password)
    {
        $this->name = $password;
        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setEmail($email)
    {
        $this->name = $email;
        return $this;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }
    public function eraseCredentials()
    {
        return null;
    }
    public function getSalt()
    {
        return null;
    }
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password,
        ]);
    }
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
        ) = unserialize($serialized);
    }
 }
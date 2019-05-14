<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="idtable1_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=45, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=45, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="salt", type="string", length=45, nullable=true)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string")
     */
    private $role;

    public function getId()
    {
        return $this->id;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function getSalt()
    {
        return $this->salt;
    }
    
    public function getRoles()
    {
        return ['ROLE_' . $this->role];
    }

    public function setRoles(string $role)
    {
        $this->role = $role;
    }

    public function eraseCredentials()
    {
        
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

}

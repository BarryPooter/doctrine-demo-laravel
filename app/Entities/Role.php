<?php namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Role
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="roles")
 */
class Role
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="name")
     */
    protected $name;

    /**
     * @var User
     * @ORM\ManyToMany(targetEntity="User")
     */
    protected $users;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Race
 *
 * @ORM\Table(name="race")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RaceRepository")
 */
class Race
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="strengh", type="integer")
     */
    private $strengh;


    /**
     * @var int
     *
     * @ORM\Column(name="armor", type="integer")
     */
    private $armor;


    /**
     * @var int
     *
     * @ORM\Column(name="dexterity", type="integer")
     */
    private $dexterity;


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
     * @return Race
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
     * @return int
     */
    public function getStrengh()
    {
        return $this->strengh;
    }

    /**
     * @param int $strengh
     */
    public function setStrengh($strengh)
    {
        $this->strengh = $strengh;
    }

    /**
     * @return int
     */
    public function getArmor()
    {
        return $this->armor;
    }

    /**
     * @param int $armor
     */
    public function setArmor($armor)
    {
        $this->armor = $armor;
    }

    /**
     * @return int
     */
    public function getDexterity()
    {
        return $this->dexterity;
    }

    /**
     * @param int $dexterity
     */
    public function setDexterity($dexterity)
    {
        $this->dexterity = $dexterity;
    }
}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personnage
 *
 * @ORM\Table(name="personnage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonnageRepository")
 */
class Personnage
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
     * @ORM\Column(name="dexterity", type="integer")
     */
    private $dexterity;

    /**
     * @var int
     *
     * @ORM\Column(name="armor", type="integer")
     */
    private $armor;

    /**
     * @var int
     *
     * @ORM\Column(name="life", type="integer")
     */
    private $life;

    /**
     * Many characters has one race.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Race")
     */
    private $race;


    /**
     * Many characters has one user.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $user;

    /**
     * Personnage constructor.
     *
     * @param string $name
     * @param int    $strengh
     * @param int    $dexterity
     * @param int    $armor
     * @param int    $life
     * @param        $race
     * @param        $user
     */


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
     * @return Personnage
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
     * Set strengh
     *
     * @param integer $strengh
     *
     * @return Personnage
     */
    public function setStrengh($strengh)
    {
        $this->strengh = $strengh;

        return $this;
    }

    /**
     * Get strengh
     *
     * @return int
     */
    public function getStrengh()
    {
        return $this->strengh;
    }

    /**
     * Set dexteerity
     *
     * @param integer $dexterity
     *
     * @return Personnage
     */
    public function setDexterity($dexterity)
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    /**
     * Get dexteerity
     *
     * @return int
     */
    public function getDexterity()
    {
        return $this->dexterity;
    }

    /**
     * Set armor
     *
     * @param integer $armor
     *
     * @return Personnage
     */
    public function setArmor($armor)
    {
        $this->armor = $armor;

        return $this;
    }

    /**
     * Get armor
     *
     * @return int
     */
    public function getArmor()
    {
        return $this->armor;
    }

    /**
     * Set life
     *
     * @param integer $life
     *
     * @return Personnage
     */
    public function setLife($life)
    {
        $this->life = $life;

        return $this;
    }

    /**
     * Get life
     *
     * @return int
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * @return mixed
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param mixed $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salle
 *
 * @ORM\Table(name="salle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SalleRepository")
 */
class Salle
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
     * @ORM\Column(name="nomSalle", type="string", length=255, nullable=true)
     */
    private $nomSalle;
    /**
     * @var int
     *
     * @ORM\Column(name="nombreLits", type="integer", nullable=true)
     */
    private $nombreLits;
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
     * @return string
     */
    public function getNomSalle()
    {
        return $this->nomSalle;
    }

    /**
     * @param string $nomSalle
     */
    public function setNomSalle($nomSalle)
    {
        $this->nomSalle = $nomSalle;
    }

    /**
     * @return int
     */
    public function getNombreLits()
    {
        return $this->nombreLits;
    }

    /**
     * @param int $nombreLits
     */
    public function setNombreLits($nombreLits)
    {
        $this->nombreLits = $nombreLits;
    }

}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 */
abstract class Facture
{
    /**
     * @var int
     *
     */
    private $id;
    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer", length=255, nullable=true)
     */
    private $montant;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEdition", type="datetime", nullable=true)
     */
    private $dateEdition;

    /**
     * @var string
     *
     * @ORM\Column(name="codeBarre", type="string", length=255, nullable=true)
     */
    private $codeBarre;

    /**
     * @var string
     *
     * @ORM\Column(name="libellefacture", type="string", length=255, nullable=true)
     */
    private $libellefacture;

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
     * @return int
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param int $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    /**
     * @return \DateTime
     */
    public function getDateEdition()
    {
        return $this->dateEdition;
    }

    /**
     * @param \DateTime $dateEdition
     */
    public function setDateEdition($dateEdition)
    {
        $this->dateEdition = $dateEdition;
    }

    /**
     * @return string
     */
    public function getCodeBarre()
    {
        return $this->codeBarre;
    }

    /**
     * @param string $codeBarre
     */
    public function setCodeBarre($codeBarre)
    {
        $this->codeBarre = $codeBarre;
    }

    /**
     * @return string
     */
    public function getLibellefacture()
    {
        return $this->libellefacture;
    }

    /**
     * @param string $libellefacture
     */
    public function setLibellefacture($libellefacture)
    {
        $this->libellefacture = $libellefacture;
    }


}


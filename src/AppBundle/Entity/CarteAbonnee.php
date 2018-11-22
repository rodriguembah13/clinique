<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarteAbonnee
 *
 * @ORM\Table(name="carte_abonnee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarteAbonneeRepository")
 */
class CarteAbonnee
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
     * @ORM\Column(name="codeCarte", type="string", nullable=true)
     */
    private $codeCarte;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAbonnement", type="datetime", nullable=true)
     */
    private $dateAbonnement;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient")
     */
    private $patient;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Entreprise")
     */
    private $entreprise;
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
    public function getCodeCarte()
    {
        return $this->codeCarte;
    }

    /**
     * @param string $codeCarte
     */
    public function setCodeCarte($codeCarte)
    {
        $this->codeCarte = $codeCarte;
    }

    /**
     * @return \DateTime
     */
    public function getDateAbonnement()
    {
        return $this->dateAbonnement;
    }

    /**
     * @param \DateTime $dateAbonnement
     */
    public function setDateAbonnement($dateAbonnement)
    {
        $this->dateAbonnement = $dateAbonnement;
    }

    /**
     * @return mixed
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * @param mixed $patient
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
    }

    /**
     * @return mixed
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * @param mixed $entreprise
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
    }

}


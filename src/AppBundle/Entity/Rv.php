<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Rv
 *
 * @ORM\Table(name="rv")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RvRepository")
 */
class Rv
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
     * @var \DateTime
     * @Assert\NotBlank
     * @ORM\Column(name="dateRendezVous", type="datetime", nullable=true)
     */
    private $dateRendezVous;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient")
     */
    private $patient;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CreneauxMedecin")
     *
     * @ORM\JoinColumn(name="creneauxMedecin", referencedColumnName="id", nullable=FALSE)
     */
    private $creneauxMedecin;
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
     * @return \DateTime
     */
    public function getDateRendezVous()
    {
        return $this->dateRendezVous;
    }

    /**
     * @param \DateTime $dateRendezVous
     */
    public function setDateRendezVous($dateRendezVous)
    {
        $this->dateRendezVous = $dateRendezVous;
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
    public function getCreneauxMedecin()
    {
        return $this->creneauxMedecin;
    }

    /**
     * @param mixed $creneauxMedecin
     */
    public function setCreneauxMedecin($creneauxMedecin)
    {
        $this->creneauxMedecin = $creneauxMedecin;
    }

}


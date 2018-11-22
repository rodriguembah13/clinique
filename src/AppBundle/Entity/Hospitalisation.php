<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hospitalisation
 *
 * @ORM\Table(name="hospitalisation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HospitalisationRepository")
 */
class Hospitalisation
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
     * @ORM\Column(name="codeHospitalisation", type="string", length=255, nullable=true)
     */
    private $codeHospitalisation;
    /**
     * @var int
     *
     * @ORM\Column(name="montantHospitalisation", type="integer",nullable=true)
     */
    private $montantHospitalisation;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient")
     */
    private $patient;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Salle")
     */
    private $salle;
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
    public function getCodeHospitalisation()
    {
        return $this->codeHospitalisation;
    }

    /**
     * @param string $codeHospitalisation
     */
    public function setCodeHospitalisation($codeHospitalisation)
    {
        $this->codeHospitalisation = $codeHospitalisation;
    }

    /**
     * @return int
     */
    public function getMontantHospitalisation()
    {
        return $this->montantHospitalisation;
    }

    /**
     * @param int $montantHospitalisation
     */
    public function setMontantHospitalisation($montantHospitalisation)
    {
        $this->montantHospitalisation = $montantHospitalisation;
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
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * @param mixed $salle
     */
    public function setSalle($salle)
    {
        $this->salle = $salle;
    }

}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnalyseMedicale
 *
 * @ORM\Table(name="analyse_medicale")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnalyseMedicaleRepository")
 */
class AnalyseMedicale extends Facture
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
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     */
    private $code;
    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255, nullable=true)
     */
    private $designation;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePrescription", type="datetime", nullable=true)
     */
    private $datePrescription;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRealisation", type="datetime", nullable=true)
     */
    private $dateRealisation;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Medecin")
     */
    private $medecin;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient")
     */
    private $patient;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TechnicienLabo")
     */
    private $technicienLabo;
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    /**
     * @return \DateTime
     */
    public function getDatePrescription()
    {
        return $this->datePrescription;
    }

    /**
     * @param \DateTime $datePrescription
     */
    public function setDatePrescription($datePrescription)
    {
        $this->datePrescription = $datePrescription;
    }

    /**
     * @return \DateTime
     */
    public function getDateRealisation()
    {
        return $this->dateRealisation;
    }

    /**
     * @param \DateTime $dateRealisation
     */
    public function setDateRealisation($dateRealisation)
    {
        $this->dateRealisation = $dateRealisation;
    }

    /**
     * @return mixed
     */
    public function getMedecin()
    {
        return $this->medecin;
    }

    /**
     * @param mixed $medecin
     */
    public function setMedecin($medecin)
    {
        $this->medecin = $medecin;
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
    public function getTechnicienLabo()
    {
        return $this->technicienLabo;
    }

    /**
     * @param mixed $technicienLabo
     */
    public function setTechnicienLabo($technicienLabo)
    {
        $this->technicienLabo = $technicienLabo;
    }

}


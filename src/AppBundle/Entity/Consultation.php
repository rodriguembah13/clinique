<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consultation
 *
 * @ORM\Table(name="consultation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConsultationRepository")
 */
class Consultation
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
     * @var string
     *
     * @ORM\Column(name="ddescription", type="string", nullable=true)
     */
    private $description;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Medecin")
     */
    private $medecin;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient")
     */
    private $patient;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeConsultation")
     */
    private $typeConsultation;
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getTypeConsultation()
    {
        return $this->typeConsultation;
    }

    /**
     * @param mixed $typeConsultation
     */
    public function setTypeConsultation($typeConsultation)
    {
        $this->typeConsultation = $typeConsultation;
    }

}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Time;

/**
 * CreneauxMedecin
 *
 * @ORM\Table(name="creneaux_medecin")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CreneauxMedecinRepository")
 */
class CreneauxMedecin
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
     * @ORM\Column(name="codeCrenneaux", type="string", length=255, nullable=true)
     */
    private $codeCrenneaux;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureDebut", type="time", nullable=true)
     */
    private $heureDebut;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureFin", type="time", nullable=true)
     */
    private $heureFin;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Medecin")
     */
    private $medecin;
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
    public function getCodeCrenneaux()
    {
        return $this->codeCrenneaux;
    }

    /**
     * @param string $codeCrenneaux
     */
    public function setCodeCrenneaux($codeCrenneaux)
    {
        $this->codeCrenneaux = $codeCrenneaux;
    }

    /**
     * @return \DateTime
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * @param \DateTime $heureDebut
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;
    }

    /**
     * @return \DateTime
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * @param \DateTime $heureFin
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;
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

}


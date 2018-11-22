<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResultatAnalyse
 *
 * @ORM\Table(name="resultat_analyse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ResultatAnalyseRepository")
 */
class ResultatAnalyse
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
     * @ORM\Column(name="descriptionResultat", type="string", length=255, nullable=true)
     */
    private $descriptionResultat;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AnalyseMedicale")
     */
    private $analyseMedicale;
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
    public function getDescriptionResultat()
    {
        return $this->descriptionResultat;
    }

    /**
     * @param string $descriptionResultat
     */
    public function setDescriptionResultat($descriptionResultat)
    {
        $this->descriptionResultat = $descriptionResultat;
    }

    /**
     * @return mixed
     */
    public function getAnalyseMedicale()
    {
        return $this->analyseMedicale;
    }

    /**
     * @param mixed $analyseMedicale
     */
    public function setAnalyseMedicale($analyseMedicale)
    {
        $this->analyseMedicale = $analyseMedicale;
    }

}


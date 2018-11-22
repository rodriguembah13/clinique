<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FactureAnalyse
 *
 * @ORM\Table(name="facture_analyse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FactureAnalyseRepository")
 */
class FactureAnalyse extends Facture
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


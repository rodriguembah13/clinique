<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FactureOrdonance
 *
 * @ORM\Table(name="facture_ordonance")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FactureOrdonanceRepository")
 */
class FactureOrdonance
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ordonnance")
     */
    private $ordonnance;
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
    public function getOrdonnance()
    {
        return $this->ordonnance;
    }

    /**
     * @param mixed $ordonnance
     */
    public function setOrdonnance($ordonnance)
    {
        $this->ordonnance = $ordonnance;
    }

}


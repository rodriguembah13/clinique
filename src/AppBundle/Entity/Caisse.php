<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caisse
 *
 * @ORM\Table(name="caisse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CaisseRepository")
 */
class Caisse
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
     * @ORM\Column(name="code", type="string", nullable=true)
     */
    private $code;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOuverture", type="datetime", nullable=true)
     */
    private $dateOuverture;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFermeture", type="datetime", nullable=true)
     */
    private $dateFermeture;

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
     * @return \DateTime
     */
    public function getDateOuverture()
    {
        return $this->dateOuverture;
    }

    /**
     * @param \DateTime $dateOuverture
     */
    public function setDateOuverture($dateOuverture)
    {
        $this->dateOuverture = $dateOuverture;
    }

    /**
     * @return \DateTime
     */
    public function getDateFermeture()
    {
        return $this->dateFermeture;
    }

    /**
     * @param \DateTime $dateFermeture
     */
    public function setDateFermeture($dateFermeture)
    {
        $this->dateFermeture = $dateFermeture;
    }

}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Text
 *
 */
class Text
{
    /**
     * @var int
     *
     */
    private $id;

    /**
     * @var \DateTime
     *
     */
    private $heure;

    /**
     * @var \DateTime
     *
     */
    private $datetime;


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
     * Set heure
     *
     * @param \DateTime $heure
     *
     * @return Text
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return \DateTime
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Text
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }
}


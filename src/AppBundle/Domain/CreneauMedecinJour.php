<?php
/**
 * Created by PhpStorm.
 * User: ballack
 * Date: 02/11/2018
 * Time: 18:13
 */

namespace AppBundle\Domain;


class CreneauMedecinJour
{
    private $crenneau;
    private $rv;

    /**
     * CreneauMedecinJour constructor.
     * @param $crenneau
     * @param $rv
     */
    public function __construct($crenneau, $rv)
    {
        $this->crenneau = $crenneau;
        $this->rv = $rv;
    }


    /**
     * @return mixed
     */
    public function getCrenneau()
    {
        return $this->crenneau;
    }

    /**
     * @param mixed $crenneau
     */
    public function setCrenneau($crenneau)
    {
        $this->crenneau = $crenneau;
    }

    /**
     * @return mixed
     */
    public function getRv()
    {
        return $this->rv;
    }

    /**
     * @param mixed $rv
     */
    public function setRv($rv)
    {
        $this->rv = $rv;
    }


}
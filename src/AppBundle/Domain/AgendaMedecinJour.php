<?php
/**
 * Created by PhpStorm.
 * User: ballack
 * Date: 02/11/2018
 * Time: 18:14
 */

namespace AppBundle\Domain;


class AgendaMedecinJour
{
   private $creneauMedecinJours;
   private $medecin;
   private $jour;

    /**
     * @return mixed
     */
    public function getCreneauMedecinJours()
    {
        return $this->creneauMedecinJours;
    }

    /**
     * @param mixed $creneauMedecinJours
     */
    public function setCreneauMedecinJours($creneauMedecinJours)
    {
        $this->creneauMedecinJours = $creneauMedecinJours;
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
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * @param mixed $jour
     */
    public function setJour($jour)
    {
        $this->jour = $jour;
    }

}
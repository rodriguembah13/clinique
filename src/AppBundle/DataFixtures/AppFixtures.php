<?php
/**
 * Created by PhpStorm.
 * User: numtekdev2
 * Date: 11/23/18
 * Time: 11:57 AM
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\CreneauxMedecin;
use AppBundle\Entity\Medecin;
use AppBundle\Entity\Patient;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        //load medecin
        for($i=1;$i<20;$i++){
            $medecin= new Medecin();
            $medecin->setNomComplet('medecin'.$i);
            $medecin->setMatricule('mat'.$i);
            $manager->persist($medecin);
        }
        //load patient
        for($i=1;$i<20;$i++){
            $patient= new Patient();
            $patient->setNomComplet('patient'.$i);
            $patient->setDateNaissance(new \DateTime());
            $patient->setNumDossier('dossier'.' '.$i);
            $manager->persist($patient);
        }
        //load crenneau medecin
/*        for($i=1;$i<20;$i++){
        $crenneauMedecin=new CreneauxMedecin();
        $crenneauMedecin->setCodeCrenneaux('creMedecin n°'.$i);
        $crenneauMedecin->setMedecin($manager->getRepository('AppBundle:Medecin')->findOneBy(array('nomComplet'=>'medecin'.$i)));
        $crenneauMedecin->setHeureDebut(new \DateTime());
        $crenneauMedecin->setHeureFin(new \DateTime());
        $manager->persist($crenneauMedecin);

        }*/
        $manager->flush();
    }
}
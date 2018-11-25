<?php

namespace AppBundle\Controller;

use AppBundle\Domain\AgendaMedecinJour;
use AppBundle\Domain\CreneauMedecinJour;
use AppBundle\Entity\Rv;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Rv controller.
 *
 * @Route("rv")
 */
class RvController extends Controller
{
    /**
     * Lists all rv entities.
     *
     * @Route("/", name="rv_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rvs = $em->getRepository('AppBundle:Rv')->findAll();

        return $this->render('rv/index.html.twig', array(
            'rvs' => $rvs,
        ));
    }

    /**
     * Creates a new rv entity.
     *
     * @Route("/new", name="rv_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $rv = new Rv();
        $form = $this->createForm('AppBundle\Form\RvType', $rv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rv);
            $em->flush();

            return $this->redirectToRoute('rv_show', array('id' => $rv->getId()));
        }

        return $this->render('rv/new.html.twig', array(
            'rv' => $rv,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a rv entity.
     *
     * @Route("/{id}", name="rv_show")
     * @Method("GET")
     */
    public function showAction(Rv $rv)
    {
        $deleteForm = $this->createDeleteForm($rv);

        return $this->render('rv/show.html.twig', array(
            'rv' => $rv,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing rv entity.
     *
     * @Route("/{id}/edit", name="rv_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Rv $rv)
    {
        $deleteForm = $this->createDeleteForm($rv);
        $editForm = $this->createForm('AppBundle\Form\RvType', $rv);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rv_edit', array('id' => $rv->getId()));
        }

        return $this->render('rv/edit.html.twig', array(
            'rv' => $rv,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a rv entity.
     *
     * @Route("/{id}", name="rv_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Rv $rv)
    {
        $form = $this->createDeleteForm($rv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rv);
            $em->flush();
        }

        return $this->redirectToRoute('rv_index');
    }
    /**
     * GetAgenda and displays.
     *
     * @Route("/agenda/{idMedecin}", name="medecin_agenda")
     * @Method("GET")
     */
    public function getAgendaMedecinsJourAction($idMedecin)
    {
        $em = $this->getDoctrine()->getManager();
        $crenneauMedecinJours=array();
        $jour=new \DateTime();
/*        $rvs = $em->getRepository('AppBundle:Rv')->findBy(array('medecin' => $idMedecin),
            array('date' => $jour));*/
        $creneauxMedecins = $em->getRepository('AppBundle:CreneauxMedecin')->findBy(array('medecin' => $idMedecin));
        $nb=0;
        foreach ($creneauxMedecins as $creneau){
            $rvs=$em->getRepository('AppBundle:Rv')->findBy(array('creneauxMedecin'=>$creneau));
            foreach ($rvs as $rv){

                $crenneauMedecinJour = new CreneauMedecinJour($creneau,$rv);
               // $crenneauMedecinJours=[$crenneauMedecinJour];
                array_push($crenneauMedecinJours,$crenneauMedecinJour);
                $nb++;
            }

           // $crenneauMedecinJours= array_push($crenneauMedecinJours,$crenneauMedecinJour);

        }
        $agenda=new AgendaMedecinJour();
        $agenda->setCreneauMedecinJours($crenneauMedecinJours);
        $agenda->setJour($jour);
        $agenda->setMedecin($em->getRepository('AppBundle:Medecin')->findOneBy(array('id' => $idMedecin)));


        return $this->render('rv/agenda.html.twig', array(
            'agenda' => $agenda,'creneauMedecinJours'=>$crenneauMedecinJours,'rdvs'=>$nb
        ));
    }
    /**
     * Creates a form to delete a rv entity.
     *
     * @param Rv $rv The rv entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rv $rv)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rv_delete', array('id' => $rv->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

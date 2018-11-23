<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CreneauxMedecin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Creneauxmedecin controller.
 *
 * @Route("creneauxmedecin")
 */
class CreneauxMedecinController extends Controller
{
    /**
     * Lists all creneauxMedecin entities.
     *
     * @Route("/", name="creneauxmedecin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $creneauxMedecins = $em->getRepository('AppBundle:CreneauxMedecin')->findAll();

        return $this->render('creneauxmedecin/index.html.twig', array(
            'creneauxMedecins' => $creneauxMedecins,
        ));
    }

    /**
     * Creates a new creneauxMedecin entity.
     *
     * @Route("/new", name="creneauxmedecin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $creneauxMedecin = new Creneauxmedecin();
        //$creneauxMedecin->setHeureDebut(new \DateTime());
       // $creneauxMedecin->setHeureFin()
        $form = $this->createForm('AppBundle\Form\CreneauxMedecinType', $creneauxMedecin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($creneauxMedecin);
            $em->flush();

            return $this->redirectToRoute('creneauxmedecin_show', array('id' => $creneauxMedecin->getId()));
        }

        return $this->render('creneauxmedecin/new.html.twig', array(
            'creneauxMedecin' => $creneauxMedecin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a creneauxMedecin entity.
     *
     * @Route("/{id}", name="creneauxmedecin_show")
     * @Method("GET")
     */
    public function showAction(CreneauxMedecin $creneauxMedecin)
    {
        $deleteForm = $this->createDeleteForm($creneauxMedecin);

        return $this->render('creneauxmedecin/show.html.twig', array(
            'creneauxMedecin' => $creneauxMedecin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing creneauxMedecin entity.
     *
     * @Route("/{id}/edit", name="creneauxmedecin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CreneauxMedecin $creneauxMedecin)
    {
        $deleteForm = $this->createDeleteForm($creneauxMedecin);
        $editForm = $this->createForm('AppBundle\Form\CreneauxMedecinType', $creneauxMedecin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('creneauxmedecin_show', array('id' => $creneauxMedecin->getId()));
        }

        return $this->render('creneauxmedecin/edit.html.twig', array(
            'creneauxMedecin' => $creneauxMedecin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a creneauxMedecin entity.
     *
     * @Route("/{id}", name="creneauxmedecin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CreneauxMedecin $creneauxMedecin)
    {
        $form = $this->createDeleteForm($creneauxMedecin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($creneauxMedecin);
            $em->flush();
        }

        return $this->redirectToRoute('creneauxmedecin_index');
    }

    /**
     * Creates a form to delete a creneauxMedecin entity.
     *
     * @param CreneauxMedecin $creneauxMedecin The creneauxMedecin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CreneauxMedecin $creneauxMedecin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('creneauxmedecin_delete', array('id' => $creneauxMedecin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

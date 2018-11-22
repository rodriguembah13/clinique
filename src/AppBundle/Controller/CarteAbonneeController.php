<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CarteAbonnee;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Carteabonnee controller.
 *
 * @Route("carteabonnee")
 */
class CarteAbonneeController extends Controller
{
    /**
     * Lists all carteAbonnee entities.
     *
     * @Route("/", name="carteabonnee_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $carteAbonnees = $em->getRepository('AppBundle:CarteAbonnee')->findAll();

        return $this->render('carteabonnee/index.html.twig', array(
            'carteAbonnees' => $carteAbonnees,
        ));
    }

    /**
     * Creates a new carteAbonnee entity.
     *
     * @Route("/new", name="carteabonnee_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $carteAbonnee = new Carteabonnee();
        $form = $this->createForm('AppBundle\Form\CarteAbonneeType', $carteAbonnee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carteAbonnee);
            $em->flush();

            return $this->redirectToRoute('carteabonnee_show', array('id' => $carteAbonnee->getId()));
        }

        return $this->render('carteabonnee/new.html.twig', array(
            'carteAbonnee' => $carteAbonnee,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a carteAbonnee entity.
     *
     * @Route("/{id}", name="carteabonnee_show")
     * @Method("GET")
     */
    public function showAction(CarteAbonnee $carteAbonnee)
    {
        $deleteForm = $this->createDeleteForm($carteAbonnee);

        return $this->render('carteabonnee/show.html.twig', array(
            'carteAbonnee' => $carteAbonnee,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing carteAbonnee entity.
     *
     * @Route("/{id}/edit", name="carteabonnee_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CarteAbonnee $carteAbonnee)
    {
        $deleteForm = $this->createDeleteForm($carteAbonnee);
        $editForm = $this->createForm('AppBundle\Form\CarteAbonneeType', $carteAbonnee);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('carteabonnee_edit', array('id' => $carteAbonnee->getId()));
        }

        return $this->render('carteabonnee/edit.html.twig', array(
            'carteAbonnee' => $carteAbonnee,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a carteAbonnee entity.
     *
     * @Route("/{id}", name="carteabonnee_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CarteAbonnee $carteAbonnee)
    {
        $form = $this->createDeleteForm($carteAbonnee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($carteAbonnee);
            $em->flush();
        }

        return $this->redirectToRoute('carteabonnee_index');
    }

    /**
     * Creates a form to delete a carteAbonnee entity.
     *
     * @param CarteAbonnee $carteAbonnee The carteAbonnee entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CarteAbonnee $carteAbonnee)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('carteabonnee_delete', array('id' => $carteAbonnee->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

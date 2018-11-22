<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Hospitalisation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Hospitalisation controller.
 *
 * @Route("hospitalisation")
 */
class HospitalisationController extends Controller
{
    /**
     * Lists all hospitalisation entities.
     *
     * @Route("/", name="hospitalisation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $hospitalisations = $em->getRepository('AppBundle:Hospitalisation')->findAll();

        return $this->render('hospitalisation/index.html.twig', array(
            'hospitalisations' => $hospitalisations,
        ));
    }

    /**
     * Creates a new hospitalisation entity.
     *
     * @Route("/new", name="hospitalisation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $hospitalisation = new Hospitalisation();
        $form = $this->createForm('AppBundle\Form\HospitalisationType', $hospitalisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hospitalisation);
            $em->flush();

            return $this->redirectToRoute('hospitalisation_show', array('id' => $hospitalisation->getId()));
        }

        return $this->render('hospitalisation/new.html.twig', array(
            'hospitalisation' => $hospitalisation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a hospitalisation entity.
     *
     * @Route("/{id}", name="hospitalisation_show")
     * @Method("GET")
     */
    public function showAction(Hospitalisation $hospitalisation)
    {
        $deleteForm = $this->createDeleteForm($hospitalisation);

        return $this->render('hospitalisation/show.html.twig', array(
            'hospitalisation' => $hospitalisation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing hospitalisation entity.
     *
     * @Route("/{id}/edit", name="hospitalisation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Hospitalisation $hospitalisation)
    {
        $deleteForm = $this->createDeleteForm($hospitalisation);
        $editForm = $this->createForm('AppBundle\Form\HospitalisationType', $hospitalisation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hospitalisation_edit', array('id' => $hospitalisation->getId()));
        }

        return $this->render('hospitalisation/edit.html.twig', array(
            'hospitalisation' => $hospitalisation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a hospitalisation entity.
     *
     * @Route("/{id}", name="hospitalisation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Hospitalisation $hospitalisation)
    {
        $form = $this->createDeleteForm($hospitalisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($hospitalisation);
            $em->flush();
        }

        return $this->redirectToRoute('hospitalisation_index');
    }

    /**
     * Creates a form to delete a hospitalisation entity.
     *
     * @param Hospitalisation $hospitalisation The hospitalisation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Hospitalisation $hospitalisation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hospitalisation_delete', array('id' => $hospitalisation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

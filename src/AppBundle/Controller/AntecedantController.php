<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Antecedant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Antecedant controller.
 *
 * @Route("antecedant")
 */
class AntecedantController extends Controller
{
    /**
     * Lists all antecedant entities.
     *
     * @Route("/", name="antecedant_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $antecedants = $em->getRepository('AppBundle:Antecedant')->findAll();

        return $this->render('antecedant/index.html.twig', array(
            'antecedants' => $antecedants,
        ));
    }

    /**
     * Creates a new antecedant entity.
     *
     * @Route("/new", name="antecedant_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $antecedant = new Antecedant();
        $form = $this->createForm('AppBundle\Form\AntecedantType', $antecedant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($antecedant);
            $em->flush();

            return $this->redirectToRoute('antecedant_show', array('id' => $antecedant->getId()));
        }

        return $this->render('antecedant/new.html.twig', array(
            'antecedant' => $antecedant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a antecedant entity.
     *
     * @Route("/{id}", name="antecedant_show")
     * @Method("GET")
     */
    public function showAction(Antecedant $antecedant)
    {
        $deleteForm = $this->createDeleteForm($antecedant);

        return $this->render('antecedant/show.html.twig', array(
            'antecedant' => $antecedant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing antecedant entity.
     *
     * @Route("/{id}/edit", name="antecedant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Antecedant $antecedant)
    {
        $deleteForm = $this->createDeleteForm($antecedant);
        $editForm = $this->createForm('AppBundle\Form\AntecedantType', $antecedant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('antecedant_edit', array('id' => $antecedant->getId()));
        }

        return $this->render('antecedant/edit.html.twig', array(
            'antecedant' => $antecedant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a antecedant entity.
     *
     * @Route("/{id}", name="antecedant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Antecedant $antecedant)
    {
        $form = $this->createDeleteForm($antecedant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($antecedant);
            $em->flush();
        }

        return $this->redirectToRoute('antecedant_index');
    }

    /**
     * Creates a form to delete a antecedant entity.
     *
     * @param Antecedant $antecedant The antecedant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Antecedant $antecedant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('antecedant_delete', array('id' => $antecedant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

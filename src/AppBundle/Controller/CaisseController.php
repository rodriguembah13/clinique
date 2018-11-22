<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Caisse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Caisse controller.
 *
 * @Route("caisse")
 */
class CaisseController extends Controller
{
    /**
     * Lists all caisse entities.
     *
     * @Route("/", name="caisse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $caisses = $em->getRepository('AppBundle:Caisse')->findAll();

        return $this->render('caisse/index.html.twig', array(
            'caisses' => $caisses,
        ));
    }

    /**
     * Creates a new caisse entity.
     *
     * @Route("/new", name="caisse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $caisse = new Caisse();
        $form = $this->createForm('AppBundle\Form\CaisseType', $caisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($caisse);
            $em->flush();

            return $this->redirectToRoute('caisse_show', array('id' => $caisse->getId()));
        }

        return $this->render('caisse/new.html.twig', array(
            'caisse' => $caisse,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a caisse entity.
     *
     * @Route("/{id}", name="caisse_show")
     * @Method("GET")
     */
    public function showAction(Caisse $caisse)
    {
        $deleteForm = $this->createDeleteForm($caisse);

        return $this->render('caisse/show.html.twig', array(
            'caisse' => $caisse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing caisse entity.
     *
     * @Route("/{id}/edit", name="caisse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Caisse $caisse)
    {
        $deleteForm = $this->createDeleteForm($caisse);
        $editForm = $this->createForm('AppBundle\Form\CaisseType', $caisse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('caisse_edit', array('id' => $caisse->getId()));
        }

        return $this->render('caisse/edit.html.twig', array(
            'caisse' => $caisse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a caisse entity.
     *
     * @Route("/{id}", name="caisse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Caisse $caisse)
    {
        $form = $this->createDeleteForm($caisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($caisse);
            $em->flush();
        }

        return $this->redirectToRoute('caisse_index');
    }

    /**
     * Creates a form to delete a caisse entity.
     *
     * @param Caisse $caisse The caisse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Caisse $caisse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('caisse_delete', array('id' => $caisse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

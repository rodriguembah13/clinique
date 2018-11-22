<?php

namespace AppBundle\Controller;

use AppBundle\Entity\FactureOrdonance;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Factureordonance controller.
 *
 * @Route("factureordonance")
 */
class FactureOrdonanceController extends Controller
{
    /**
     * Lists all factureOrdonance entities.
     *
     * @Route("/", name="factureordonance_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $factureOrdonances = $em->getRepository('AppBundle:FactureOrdonance')->findAll();

        return $this->render('factureordonance/index.html.twig', array(
            'factureOrdonances' => $factureOrdonances,
        ));
    }

    /**
     * Creates a new factureOrdonance entity.
     *
     * @Route("/new", name="factureordonance_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $factureOrdonance = new Factureordonance();
        $form = $this->createForm('AppBundle\Form\FactureOrdonanceType', $factureOrdonance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($factureOrdonance);
            $em->flush();

            return $this->redirectToRoute('factureordonance_show', array('id' => $factureOrdonance->getId()));
        }

        return $this->render('factureordonance/new.html.twig', array(
            'factureOrdonance' => $factureOrdonance,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a factureOrdonance entity.
     *
     * @Route("/{id}", name="factureordonance_show")
     * @Method("GET")
     */
    public function showAction(FactureOrdonance $factureOrdonance)
    {
        $deleteForm = $this->createDeleteForm($factureOrdonance);

        return $this->render('factureordonance/show.html.twig', array(
            'factureOrdonance' => $factureOrdonance,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing factureOrdonance entity.
     *
     * @Route("/{id}/edit", name="factureordonance_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, FactureOrdonance $factureOrdonance)
    {
        $deleteForm = $this->createDeleteForm($factureOrdonance);
        $editForm = $this->createForm('AppBundle\Form\FactureOrdonanceType', $factureOrdonance);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('factureordonance_edit', array('id' => $factureOrdonance->getId()));
        }

        return $this->render('factureordonance/edit.html.twig', array(
            'factureOrdonance' => $factureOrdonance,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a factureOrdonance entity.
     *
     * @Route("/{id}", name="factureordonance_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, FactureOrdonance $factureOrdonance)
    {
        $form = $this->createDeleteForm($factureOrdonance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($factureOrdonance);
            $em->flush();
        }

        return $this->redirectToRoute('factureordonance_index');
    }

    /**
     * Creates a form to delete a factureOrdonance entity.
     *
     * @param FactureOrdonance $factureOrdonance The factureOrdonance entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FactureOrdonance $factureOrdonance)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('factureordonance_delete', array('id' => $factureOrdonance->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

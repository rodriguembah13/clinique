<?php

namespace AppBundle\Controller;

use AppBundle\Entity\FactureAnalyse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Factureanalyse controller.
 *
 * @Route("factureanalyse")
 */
class FactureAnalyseController extends Controller
{
    /**
     * Lists all factureAnalyse entities.
     *
     * @Route("/", name="factureanalyse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $factureAnalyses = $em->getRepository('AppBundle:FactureAnalyse')->findAll();

        return $this->render('factureanalyse/index.html.twig', array(
            'factureAnalyses' => $factureAnalyses,
        ));
    }

    /**
     * Creates a new factureAnalyse entity.
     *
     * @Route("/new", name="factureanalyse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $factureAnalyse = new Factureanalyse();
        $form = $this->createForm('AppBundle\Form\FactureAnalyseType', $factureAnalyse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($factureAnalyse);
            $em->flush();

            return $this->redirectToRoute('factureanalyse_show', array('id' => $factureAnalyse->getId()));
        }

        return $this->render('factureanalyse/new.html.twig', array(
            'factureAnalyse' => $factureAnalyse,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a factureAnalyse entity.
     *
     * @Route("/{id}", name="factureanalyse_show")
     * @Method("GET")
     */
    public function showAction(FactureAnalyse $factureAnalyse)
    {
        $deleteForm = $this->createDeleteForm($factureAnalyse);

        return $this->render('factureanalyse/show.html.twig', array(
            'factureAnalyse' => $factureAnalyse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing factureAnalyse entity.
     *
     * @Route("/{id}/edit", name="factureanalyse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, FactureAnalyse $factureAnalyse)
    {
        $deleteForm = $this->createDeleteForm($factureAnalyse);
        $editForm = $this->createForm('AppBundle\Form\FactureAnalyseType', $factureAnalyse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('factureanalyse_edit', array('id' => $factureAnalyse->getId()));
        }

        return $this->render('factureanalyse/edit.html.twig', array(
            'factureAnalyse' => $factureAnalyse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a factureAnalyse entity.
     *
     * @Route("/{id}", name="factureanalyse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, FactureAnalyse $factureAnalyse)
    {
        $form = $this->createDeleteForm($factureAnalyse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($factureAnalyse);
            $em->flush();
        }

        return $this->redirectToRoute('factureanalyse_index');
    }

    /**
     * Creates a form to delete a factureAnalyse entity.
     *
     * @param FactureAnalyse $factureAnalyse The factureAnalyse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FactureAnalyse $factureAnalyse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('factureanalyse_delete', array('id' => $factureAnalyse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

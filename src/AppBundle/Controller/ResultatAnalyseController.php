<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ResultatAnalyse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Resultatanalyse controller.
 *
 * @Route("resultatanalyse")
 */
class ResultatAnalyseController extends Controller
{
    /**
     * Lists all resultatAnalyse entities.
     *
     * @Route("/", name="resultatanalyse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resultatAnalyses = $em->getRepository('AppBundle:ResultatAnalyse')->findAll();

        return $this->render('resultatanalyse/index.html.twig', array(
            'resultatAnalyses' => $resultatAnalyses,
        ));
    }

    /**
     * Creates a new resultatAnalyse entity.
     *
     * @Route("/new", name="resultatanalyse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $resultatAnalyse = new Resultatanalyse();
        $form = $this->createForm('AppBundle\Form\ResultatAnalyseType', $resultatAnalyse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resultatAnalyse);
            $em->flush();

            return $this->redirectToRoute('resultatanalyse_show', array('id' => $resultatAnalyse->getId()));
        }

        return $this->render('resultatanalyse/new.html.twig', array(
            'resultatAnalyse' => $resultatAnalyse,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a resultatAnalyse entity.
     *
     * @Route("/{id}", name="resultatanalyse_show")
     * @Method("GET")
     */
    public function showAction(ResultatAnalyse $resultatAnalyse)
    {
        $deleteForm = $this->createDeleteForm($resultatAnalyse);

        return $this->render('resultatanalyse/show.html.twig', array(
            'resultatAnalyse' => $resultatAnalyse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing resultatAnalyse entity.
     *
     * @Route("/{id}/edit", name="resultatanalyse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ResultatAnalyse $resultatAnalyse)
    {
        $deleteForm = $this->createDeleteForm($resultatAnalyse);
        $editForm = $this->createForm('AppBundle\Form\ResultatAnalyseType', $resultatAnalyse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resultatanalyse_edit', array('id' => $resultatAnalyse->getId()));
        }

        return $this->render('resultatanalyse/edit.html.twig', array(
            'resultatAnalyse' => $resultatAnalyse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a resultatAnalyse entity.
     *
     * @Route("/{id}", name="resultatanalyse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ResultatAnalyse $resultatAnalyse)
    {
        $form = $this->createDeleteForm($resultatAnalyse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resultatAnalyse);
            $em->flush();
        }

        return $this->redirectToRoute('resultatanalyse_index');
    }

    /**
     * Creates a form to delete a resultatAnalyse entity.
     *
     * @param ResultatAnalyse $resultatAnalyse The resultatAnalyse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ResultatAnalyse $resultatAnalyse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('resultatanalyse_delete', array('id' => $resultatAnalyse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

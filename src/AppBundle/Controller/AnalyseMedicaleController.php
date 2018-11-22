<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AnalyseMedicale;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Analysemedicale controller.
 *
 * @Route("analysemedicale")
 */
class AnalyseMedicaleController extends Controller
{
    /**
     * Lists all analyseMedicale entities.
     *
     * @Route("/", name="analysemedicale_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $analyseMedicales = $em->getRepository('AppBundle:AnalyseMedicale')->findAll();

        return $this->render('analysemedicale/index.html.twig', array(
            'analyseMedicales' => $analyseMedicales,
        ));
    }

    /**
     * Creates a new analyseMedicale entity.
     *
     * @Route("/new", name="analysemedicale_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $analyseMedicale = new Analysemedicale();
        $form = $this->createForm('AppBundle\Form\AnalyseMedicaleType', $analyseMedicale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($analyseMedicale);
            $em->flush();

            return $this->redirectToRoute('analysemedicale_show', array('id' => $analyseMedicale->getId()));
        }

        return $this->render('analysemedicale/new.html.twig', array(
            'analyseMedicale' => $analyseMedicale,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a analyseMedicale entity.
     *
     * @Route("/{id}", name="analysemedicale_show")
     * @Method("GET")
     */
    public function showAction(AnalyseMedicale $analyseMedicale)
    {
        $deleteForm = $this->createDeleteForm($analyseMedicale);

        return $this->render('analysemedicale/show.html.twig', array(
            'analyseMedicale' => $analyseMedicale,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing analyseMedicale entity.
     *
     * @Route("/{id}/edit", name="analysemedicale_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AnalyseMedicale $analyseMedicale)
    {
        $deleteForm = $this->createDeleteForm($analyseMedicale);
        $editForm = $this->createForm('AppBundle\Form\AnalyseMedicaleType', $analyseMedicale);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('analysemedicale_edit', array('id' => $analyseMedicale->getId()));
        }

        return $this->render('analysemedicale/edit.html.twig', array(
            'analyseMedicale' => $analyseMedicale,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a analyseMedicale entity.
     *
     * @Route("/{id}", name="analysemedicale_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AnalyseMedicale $analyseMedicale)
    {
        $form = $this->createDeleteForm($analyseMedicale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($analyseMedicale);
            $em->flush();
        }

        return $this->redirectToRoute('analysemedicale_index');
    }

    /**
     * Creates a form to delete a analyseMedicale entity.
     *
     * @param AnalyseMedicale $analyseMedicale The analyseMedicale entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AnalyseMedicale $analyseMedicale)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('analysemedicale_delete', array('id' => $analyseMedicale->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

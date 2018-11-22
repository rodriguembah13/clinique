<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TechnicienLabo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Technicienlabo controller.
 *
 * @Route("technicienlabo")
 */
class TechnicienLaboController extends Controller
{
    /**
     * Lists all technicienLabo entities.
     *
     * @Route("/", name="technicienlabo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $technicienLabos = $em->getRepository('AppBundle:TechnicienLabo')->findAll();

        return $this->render('technicienlabo/index.html.twig', array(
            'technicienLabos' => $technicienLabos,
        ));
    }

    /**
     * Creates a new technicienLabo entity.
     *
     * @Route("/new", name="technicienlabo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $technicienLabo = new Technicienlabo();
        $form = $this->createForm('AppBundle\Form\TechnicienLaboType', $technicienLabo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($technicienLabo);
            $em->flush();

            return $this->redirectToRoute('technicienlabo_show', array('id' => $technicienLabo->getId()));
        }

        return $this->render('technicienlabo/new.html.twig', array(
            'technicienLabo' => $technicienLabo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a technicienLabo entity.
     *
     * @Route("/{id}", name="technicienlabo_show")
     * @Method("GET")
     */
    public function showAction(TechnicienLabo $technicienLabo)
    {
        $deleteForm = $this->createDeleteForm($technicienLabo);

        return $this->render('technicienlabo/show.html.twig', array(
            'technicienLabo' => $technicienLabo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing technicienLabo entity.
     *
     * @Route("/{id}/edit", name="technicienlabo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TechnicienLabo $technicienLabo)
    {
        $deleteForm = $this->createDeleteForm($technicienLabo);
        $editForm = $this->createForm('AppBundle\Form\TechnicienLaboType', $technicienLabo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('technicienlabo_edit', array('id' => $technicienLabo->getId()));
        }

        return $this->render('technicienlabo/edit.html.twig', array(
            'technicienLabo' => $technicienLabo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a technicienLabo entity.
     *
     * @Route("/{id}", name="technicienlabo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TechnicienLabo $technicienLabo)
    {
        $form = $this->createDeleteForm($technicienLabo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($technicienLabo);
            $em->flush();
        }

        return $this->redirectToRoute('technicienlabo_index');
    }

    /**
     * Creates a form to delete a technicienLabo entity.
     *
     * @param TechnicienLabo $technicienLabo The technicienLabo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TechnicienLabo $technicienLabo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('technicienlabo_delete', array('id' => $technicienLabo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

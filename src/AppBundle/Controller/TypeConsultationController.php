<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TypeConsultation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Typeconsultation controller.
 *
 * @Route("typeconsultation")
 */
class TypeConsultationController extends Controller
{
    /**
     * Lists all typeConsultation entities.
     *
     * @Route("/", name="typeconsultation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeConsultations = $em->getRepository('AppBundle:TypeConsultation')->findAll();

        return $this->render('typeconsultation/index.html.twig', array(
            'typeConsultations' => $typeConsultations,
        ));
    }

    /**
     * Creates a new typeConsultation entity.
     *
     * @Route("/new", name="typeconsultation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typeConsultation = new Typeconsultation();
        $form = $this->createForm('AppBundle\Form\TypeConsultationType', $typeConsultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeConsultation);
            $em->flush();

            return $this->redirectToRoute('typeconsultation_show', array('id' => $typeConsultation->getId()));
        }

        return $this->render('typeconsultation/new.html.twig', array(
            'typeConsultation' => $typeConsultation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeConsultation entity.
     *
     * @Route("/{id}", name="typeconsultation_show")
     * @Method("GET")
     */
    public function showAction(TypeConsultation $typeConsultation)
    {
        $deleteForm = $this->createDeleteForm($typeConsultation);

        return $this->render('typeconsultation/show.html.twig', array(
            'typeConsultation' => $typeConsultation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeConsultation entity.
     *
     * @Route("/{id}/edit", name="typeconsultation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TypeConsultation $typeConsultation)
    {
        $deleteForm = $this->createDeleteForm($typeConsultation);
        $editForm = $this->createForm('AppBundle\Form\TypeConsultationType', $typeConsultation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeconsultation_edit', array('id' => $typeConsultation->getId()));
        }

        return $this->render('typeconsultation/edit.html.twig', array(
            'typeConsultation' => $typeConsultation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeConsultation entity.
     *
     * @Route("/{id}", name="typeconsultation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TypeConsultation $typeConsultation)
    {
        $form = $this->createDeleteForm($typeConsultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeConsultation);
            $em->flush();
        }

        return $this->redirectToRoute('typeconsultation_index');
    }

    /**
     * Creates a form to delete a typeConsultation entity.
     *
     * @param TypeConsultation $typeConsultation The typeConsultation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeConsultation $typeConsultation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeconsultation_delete', array('id' => $typeConsultation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Medecin;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Medecin controller.
 *
 * @Route("medecin")
 */
class MedecinController extends Controller
{
    /**
     * Lists all medecin entities.
     *
     * @Route("/", name="medecin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $medecins = $em->getRepository('AppBundle:Medecin')->findAll();

        return $this->render('medecin/index.html.twig', array(
            'medecins' => $medecins,
        ));
    }
/*    public function pdfAction()
    {
        $html = $this->renderView('medecin/index.html.twig', array(
            'some'  => $vars
        ));

        return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            'file.pdf'
        );
    }*/
    /**
     *
     * @Route("/pdf", name="medecin_pdf")
     * @Method({"GET"})
     */
public function pdfAction(){
    $snappy = $this->get('knp_snappy.pdf');
    $em = $this->getDoctrine()->getManager();

    $medecins = $em->getRepository('AppBundle:Medecin')->findAll();
$titre="liste des medecins";
    //$html = '<h1>Hello</h1>'.'<br>'.'<table><tr><th>id</th></tr><tr><td></td></tr></table>';
    $html = $this->renderView('medecin/tabletoprint.html.twig', array(
        'medecins' => $medecins,'titre'=>$titre
    ));
    $filename = 'myFirstSnappyPDF';

    return new Response(
        $snappy->getOutputFromHtml($html),
        200,
        array(
            'Content-Type'          => 'application/pdf',
            'Content-Disposition'   => 'attachment; filename="'.$filename.'.pdf"'
        )
    );
}
    /**
     * Creates a new medecin entity.
     *
     * @Route("/new", name="medecin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $medecin = new Medecin();
        $form = $this->createForm('AppBundle\Form\MedecinType', $medecin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $rang=random_int(0,100);
            $currentyear= \date('y');
            $medecin->setMatricule("M".$rang.$currentyear);
            $em->persist($medecin);
            $em->flush();

            return $this->redirectToRoute('medecin_show', array('id' => $medecin->getId()));
        }

        return $this->render('medecin/new.html.twig', array(
            'medecin' => $medecin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a medecin entity.
     *
     * @Route("/{id}", name="medecin_show")
     * @Method("GET")
     */
    public function showAction(Medecin $medecin)
    {
        $deleteForm = $this->createDeleteForm($medecin);

        return $this->render('medecin/show.html.twig', array(
            'medecin' => $medecin,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Finds and displays a medecin entity.
     *
     * @Route("/", name="medecin_search")
     * @Method("GET")
     */
    public function searchAction(Request $request)
    {
        $medecins=[];
        $em = $this->getDoctrine()->getManager();
        $this->$medecins = $em->getRepository('AppBundle:Medecin')->findBy(array('nomComplet' => $request->get('table_search')));
        return $this->render('medecin/index.html.twig', array(
            'medecins' => $this->$medecins,
        ));

    }
    /**
     * Displays a form to edit an existing medecin entity.
     *
     * @Route("/{id}/edit", name="medecin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Medecin $medecin)
    {
        $deleteForm = $this->createDeleteForm($medecin);
        $editForm = $this->createForm('AppBundle\Form\MedecinType', $medecin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medecin_edit', array('id' => $medecin->getId()));
        }

        return $this->render('medecin/edit.html.twig', array(
            'medecin' => $medecin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a medecin entity.
     *
     * @Route("/{id}", name="medecin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Medecin $medecin)
    {
        $form = $this->createDeleteForm($medecin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($medecin);
            $em->flush();
        }

        return $this->redirectToRoute('medecin_index');
    }

    /**
     * Creates a form to delete a medecin entity.
     *
     * @param Medecin $medecin The medecin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Medecin $medecin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('medecin_delete', array('id' => $medecin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

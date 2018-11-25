<?php

namespace AppBundle\Controller;

use AppBundle\Domain\AgendaMedecinJour;
use AppBundle\Domain\CreneauMedecinJour;
use AppBundle\Entity\Rv;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
          //  'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * Creates a new rv entity.
     *
     * @Route("/new", name="rvindex_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $rv = new Rv();
        $form = $this->createForm('AppBundle\Form\RvType', $rv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rv);
            $em->flush();

            return $this->redirectToRoute('rv_show', array('id' => $rv->getId()));
        }

        return $this->render('rv/new.html.twig', array(
            'rv' => $rv,
            'form' => $form->createView(),
        ));
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: ballack
 * Date: 23/11/2018
 * Time: 06:31
 */

namespace AppBundle\Controller;
use FOS\UserBundle\Controller\SecurityController as BaseSecurityController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
/**
 * Security controller.
 *
 * @Route("security")
 */
class SecurityController extends BaseSecurityController
{
    /**
     * @param Request $request
     *
     * @Route("/login", name="login_index")
     * @Method("GET")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
    {
       $response=parent::loginAction($request);
       return $response;
    }
    /**
     * Renders the login template with the given parameters. Overwrite this function in
     * an extended controller to provide additional data for the login template.
     *
     * @param array $data
     *
     * @return Response|\Symfony\Component\HttpFoundation\Response
     */
    protected function renderLogin(array $data)
    {
        return $this->render('Security/login.html.twig', $data);
    }
}
<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function index()
    {

        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/api/current-user", name="api_current_user")
     */
    public function getCurrentUser()
    {

        if (!$this->container->has('security.token_storage')) {
            throw new \LogicException('The Security Bundle is not registered in your application.');
        }
        if (null === $token = $this->container->get('security.token_storage')->getToken()) {
            throw new AccessDeniedHttpException();
        }
        if (!is_object($user = $token->getUser())) {
            // e.g. anonymous authentication
            throw new AccessDeniedHttpException();
        }
        // var_dump($user); die;
        return $this->redirect('/api/users/' . $user->getId() . '.json');
    }

}
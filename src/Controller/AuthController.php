<?php

namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthController extends AbstractController
{
    /**
     * @Route("/register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        $requestContent = json_decode($request->getContent(), true);

        $user = new User();
        $user->setEmail($requestContent['email']);
        $user->setPassword($encoder->encodePassword($user, $requestContent['password']));
        $em->persist($user);
        $em->flush();

        return new Response(sprintf('User %s successfully created', $user->getEmail()));
    }

    /**
     * @Route("/api")
     */
    public function api()
    {
        return new Response(sprintf('Logged in as %s', $this->getUser()->getEmail()));
    }
}
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {   //si problème d'authentification on peut la récupérer
        $error = $authenticationUtils->getLastAuthenticationError();
        //si l'user se trompe de not de passe cela lui permet de lui remettre son login
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'logout')]
    // on déclare cette action mais on ne passera jamais dedans
    public function logout(): void
    {
        throw new Exception('Oups.');
    }
}
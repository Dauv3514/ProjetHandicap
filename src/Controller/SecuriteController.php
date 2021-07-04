<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ConnexionType;
use App\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SecuriteController extends AbstractController
{
    /**
     * @Route("/connexion", name="securite_connexion")
     */
    public function connexion(): Response
    {
        $form = $this->createForm(ConnexionType:: class);

        return $this->render('securite/connexion.html.twig', [
        'form' => $form->createView(),
        ]) ;

    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Request $request): Response

    {
        $user = new User();
        $form = $this->createForm(InscriptionType:: class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('securite/inscription.html.twig', [
            'form' => $form->createView(),
            
        ]);
        
    }
}

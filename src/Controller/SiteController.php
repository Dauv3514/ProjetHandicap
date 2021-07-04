<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil(): Response
    {
        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/concept", name="concept")
     */
    public function index(): Response
    {
        return $this->render('site/concept.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/sorties", name="sorties")
     */
    public function sorties(Request $request): Response
    {
        //affiche mes données sur la page
        $repo=$this->getDoctrine()->getRepository(Sortie::class);
        $sorties = $repo->findAll();

        $repository=$this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();


        return $this->render('site/sorties.html.twig', [
            'sorties'=>$sorties,
            'users'=>$users,
        ]);
    }

    /**
     * @Route("/presentation", name="presentation")
     */
    public function presentation(): Response
    {
        return $this->render('site/presentation.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    

}

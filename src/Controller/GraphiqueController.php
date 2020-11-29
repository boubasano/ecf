<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GraphiqueController extends AbstractController
{
    /**
     * @Route("/graphique", name="graphique")
     */
    public function index(): Response
    {
        return $this->render('graphique/index.html.twig', [
            'controller_name' => 'GraphiqueController',
        ]);
    }
}

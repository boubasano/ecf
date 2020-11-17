<?php

namespace App\Controller;

use App\Repository\MeteoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeteoController extends AbstractController
{
    /**
     * @Route("/meteo", name="meteo")
     */
    public function index(MeteoRepository $meteoRepository): Response
    {
        return $this->render('meteo/index.html.twig', [
            'meteo' => $meteoRepository->findAll(),
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Meteo;
use App\Repository\MeteoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MeteoController
 * @package App\Controller
 * @Route ("/meteo")
 */
class MeteoController extends AbstractController
{

    protected $meteo;
    public function __construct(MeteoRepository $meteoRepository)
    {
        $this->meteo = $meteoRepository;
    }

    /**
     * @Route("/", name="meteo")
     */
    public function index(): Response
    {
        return $this->render('meteo/index.html.twig', [
            'meteo' => $this->meteo->findAll(),
        ]);
    }

    /**
     * @Route("/name", name="meteo-show", methods={"GET", "POST"})
     */
    public function show(MeteoRepository $repository)
    {

        $meteosearched = $repository->findMeteoByName("venissieux");

        if (!$meteosearched) {
            throw $this->createNotFoundException(
                "Nous n'avons pas de données concernant cette ville "
            );
        }
        return $this->render('meteo/show.html.twig', [
            'meteosearched' => $meteosearched,
        ]);
    }
}








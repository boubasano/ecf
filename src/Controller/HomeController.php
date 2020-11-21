<?php

namespace App\Controller;

use App\Entity\Meteo;
use App\Form\MeteoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class HomeController extends AbstractController
{
    private $param;

    public function __construct(ParameterBagInterface $param)
    {
        $this->param = $param;
    }

    /**
     * @Route("/", name="home", methods={"GET", "POST"})
     */
    public function addMeteoInfos(Request $request)
    {
        $meteo = new Meteo();
        $form = $this->createForm(MeteoType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $url = $this->param->get('api.meteo.url');
                $key = $this->param->get('api.meteo.key');
                $ville = $request->request->get('search');
                $fullUrl = $url . $key . $ville;
                $meteoInfos = json_decode(file_get_contents($fullUrl));
                $meteo->setName($meteoInfos->location->name);
                $meteo->setWeatherDescriptions($meteoInfos->current->weather_descriptions[0]);
                $meteo->setTemperature($meteoInfos->current->temperature);
                $meteo->setHumidity($meteoInfos->current->humidity);
                $meteo->setWeatherIcons($meteoInfos->current->weather_icons[0]);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($meteo);
                $entityManager->flush();
            } catch (\Exception $exception) {
                $this->addFlash(
                    'error',
                    'Server error: ' . $exception->getMessage()
                );
            }

            return $this->redirectToRoute('meteo-show');
        }
        return $this->render('home/index.html.twig', [
            'meteo' => $meteo,
            'form' => $form->createView(),

        ]);
    }
}

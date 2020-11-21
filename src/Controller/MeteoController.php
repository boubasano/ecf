<?php

namespace App\Controller;

use App\Entity\Meteo;
use App\Repository\MeteoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator;
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
    /**
     * @Route("/", name="meteo")
     */
    public function index(MeteoRepository $meteoRepository): Response
    {
        return $this->render('meteo/index.html.twig', [
            'meteo' => $meteoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/city/", name="meteo-show", methods={"GET", "POST"})
     */
    public function show(EntityManagerInterface $entityManager)
    {
        try {
            $q = $entityManager->createQuery("SELECT m FROM App:Meteo m ORDER BY m.id DESC")
                ->setMaxResults(1)
                ->setLifetime(1);
        } catch (\Exception $exception) {
            $this->addFlash(
                'error',
                'Server error: ' . $exception->getMessage()
            );
        }
        $meteo = $q->getResult();

        return $this->render('meteo/show.html.twig', [
            'meteo' => $meteo,
        ]);
    }

    /**
     * @Route ("/{id}", name="meteo-delete", methods={"DELETE"})
     */
    public function delete(Request $request, Meteo $meteo): Response
    {
        if ($this->isCsrfTokenValid('delete' . $meteo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($meteo);
            $entityManager->flush();
        }
        return $this->redirectToRoute('meteo');
    }

    /**
     * @Route("/detail/{name}", name="detail-meteo")
     */
    public function detail(MeteoRepository $meteoRepository, $name)
    {
        $meteo = $meteoRepository->findMeteoByName($name);
        return $this->render("meteo/detail.html.twig", [
            'meteo' => $meteo,
            'name' => $name,]);
    }
}











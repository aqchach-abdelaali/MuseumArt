<?php

namespace App\Controller;

use App\Entity\Peinture;
use App\Repository\PeintureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeintureController extends AbstractController
{
    /**
     * @Route("/realisations", name="realisations")
     */
    public function realisations(PeintureRepository $peintureRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $date = $peintureRepository->findAll();

        $peintures = $paginator->paginate($date, $request->query->getInt('page', 1), 6);

        return $this->render('peinture/realisations.html.twig', [
            'peintures' => $peintures,
        ]);
    }

    /**
     * @Route("/realisations/{slug}", name="realisations_details")
     */
    public function details(Peinture $peinture): Response
    {
        return $this->render('peinture/details.html.twig', [
            'peinture' => $peinture,
        ]);
    }
}

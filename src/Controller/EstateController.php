<?php

namespace App\Controller;

use App\Repository\EstateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EstateController extends AbstractController
{
    #[Route('/biens', name: 'estate_index')]
    public function index(EstateRepository $estateRepository): Response
    {
        $estates = $estateRepository->findAll();
        return $this->render('estate/index.html.twig', [
            'estates' => $estates,
        ]);
    }
}

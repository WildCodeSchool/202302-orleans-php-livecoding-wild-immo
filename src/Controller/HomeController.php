<?php

namespace App\Controller;

use App\Repository\GuideRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(GuideRepository $guideRepository): Response
    {
        $guides = $guideRepository->findBy([], ['createdAt' => 'DESC'], 6);
        return $this->render('home/index.html.twig', [
            'guides' => $guides,
        ]);
    }
}

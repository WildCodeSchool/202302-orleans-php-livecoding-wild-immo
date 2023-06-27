<?php

namespace App\Controller;

use App\Form\EstateSearchType;
use App\Repository\EstateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EstateController extends AbstractController
{
    #[Route('/biens', name: 'estate_index')]
    public function index(EstateRepository $estateRepository, Request $request): Response
    {
        $form = $this->createForm(EstateSearchType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $estates = $estateRepository->searchEstate($data['search']);
        } else {
            $estates = $estateRepository->findAll();
        }
        return $this->render('estate/index.html.twig', [
            'estates' => $estates,
            'form' => $form,
        ]);
    }
}

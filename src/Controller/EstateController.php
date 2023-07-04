<?php

namespace App\Controller;

use App\Entity\EstateSearch;
use App\Form\EstateSearchType;
use App\Repository\EstateRepository;
use App\Service\DistanceCalculator;
use App\Service\Locator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EstateController extends AbstractController
{
    #[Route('/biens', name: 'estate_index')]
    public function index(
        EstateRepository $estateRepository,
        Request $request,
        Locator $locator,
        DistanceCalculator $distanceCalculator
    ): Response {
        $estateSearch = new EstateSearch();
        $form = $this->createForm(EstateSearchType::class, $estateSearch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $estates = $estateRepository->searchEstate($estateSearch);
            if ($estateSearch->getLocalization()) {
                [$longitude, $latitude]  = $locator->getCoordinates($estateSearch);
                $estateSearch->setLongitude($longitude)->setLatitude($latitude);

                $estates = array_filter(
                    $estates,
                    fn ($estate) => $distanceCalculator->isClose(
                        $estateSearch,
                        $estate,
                        $estateSearch->getRadius()
                    )
                );
            }
        } else {
            $estates = $estateRepository->findAll();
        }
        return $this->render('estate/index.html.twig', [
            'estates' => $estates,
            'form' => $form,
        ]);
    }
}

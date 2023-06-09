<?php

namespace App\Controller;

use Exception;
use App\Entity\Estate;
use App\Form\EstateType;
use App\Service\Locator;
use App\Repository\EstateRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/estate')]
class AdminEstateController extends AbstractController
{
    #[Route('/', name: 'app_admin_estate_index', methods: ['GET'])]
    public function index(EstateRepository $estateRepository): Response
    {
        return $this->render('admin_estate/index.html.twig', [
            'estates' => $estateRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_estate_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EstateRepository $estateRepository, Locator $locator): Response
    {
        $estate = new Estate();
        $form = $this->createForm(EstateType::class, $estate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                [$longitude, $latitude] = $locator->getCoordinates($estate);
                $estate->setLongitude($longitude);
                $estate->setLatitude($latitude);
            } catch (Exception $e) {
                $this->addFlash('danger', $e->getMessage());
            }
            $estateRepository->save($estate, true);

            return $this->redirectToRoute('app_admin_estate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_estate/new.html.twig', [
            'estate' => $estate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_estate_show', methods: ['GET'])]
    public function show(Estate $estate): Response
    {
        return $this->render('admin_estate/show.html.twig', [
            'estate' => $estate,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_estate_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Estate $estate,
        EstateRepository $estateRepository,
        Locator $locator
    ): Response {
        $form = $this->createForm(EstateType::class, $estate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                [$longitude, $latitude] = $locator->getCoordinates($estate);
                $estate->setLongitude($longitude);
                $estate->setLatitude($latitude);
            } catch (Exception $e) {
                $this->addFlash('danger', $e->getMessage());
                $estate->setLongitude(null)->setLatitude(null);
            }

            $estateRepository->save($estate, true);

            return $this->redirectToRoute('app_admin_estate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_estate/edit.html.twig', [
            'estate' => $estate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_estate_delete', methods: ['POST'])]
    public function delete(Request $request, Estate $estate, EstateRepository $estateRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $estate->getId(), $request->request->get('_token'))) {
            $estateRepository->remove($estate, true);
        }

        return $this->redirectToRoute('app_admin_estate_index', [], Response::HTTP_SEE_OTHER);
    }
}

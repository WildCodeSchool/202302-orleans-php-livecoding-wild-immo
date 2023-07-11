<?php

namespace App\Controller;

use App\Entity\Caracteristic;
use App\Form\CaracteristicType;
use App\Repository\CaracteristicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/caracteristic')]
class AdminCaracteristicController extends AbstractController
{
    #[Route('/', name: 'app_admin_caracteristic_index', methods: ['GET'])]
    public function index(CaracteristicRepository $caracRepository): Response
    {
        return $this->render('admin_caracteristic/index.html.twig', [
            'caracteristics' => $caracRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_caracteristic_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CaracteristicRepository $caracRepository): Response
    {
        $caracteristic = new Caracteristic();
        $form = $this->createForm(CaracteristicType::class, $caracteristic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $caracRepository->save($caracteristic, true);

            return $this->redirectToRoute('app_admin_caracteristic_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_caracteristic/new.html.twig', [
            'caracteristic' => $caracteristic,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_caracteristic_show', methods: ['GET'])]
    public function show(Caracteristic $caracteristic): Response
    {
        return $this->render('admin_caracteristic/show.html.twig', [
            'caracteristic' => $caracteristic,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_caracteristic_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Caracteristic $caracteristic,
        CaracteristicRepository $caracRepository
    ): Response {
        $form = $this->createForm(CaracteristicType::class, $caracteristic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $caracRepository->save($caracteristic, true);

            return $this->redirectToRoute('app_admin_caracteristic_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_caracteristic/edit.html.twig', [
            'caracteristic' => $caracteristic,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_caracteristic_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        Caracteristic $caracteristic,
        CaracteristicRepository $caracRepository
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $caracteristic->getId(), $request->request->get('_token'))) {
            $caracRepository->remove($caracteristic, true);
        }

        return $this->redirectToRoute('app_admin_caracteristic_index', [], Response::HTTP_SEE_OTHER);
    }
}

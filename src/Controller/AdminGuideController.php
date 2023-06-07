<?php

namespace App\Controller;

use App\Entity\Guide;
use App\Form\GuideType;
use App\Repository\GuideRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/guide')]
class AdminGuideController extends AbstractController
{
    #[Route('/', name: 'app_admin_guide_index', methods: ['GET'])]
    public function index(GuideRepository $guideRepository): Response
    {
        return $this->render('admin_guide/index.html.twig', [
            'guides' => $guideRepository->findBy([], ['createdAt' => 'DESC']),
        ]);
    }

    #[Route('/new', name: 'app_admin_guide_new', methods: ['GET', 'POST'])]
    public function new(Request $request, GuideRepository $guideRepository): Response
    {
        $guide = new Guide();
        $form = $this->createForm(GuideType::class, $guide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $guideRepository->save($guide, true);

            return $this->redirectToRoute('app_admin_guide_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_guide/new.html.twig', [
            'guide' => $guide,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_guide_show', methods: ['GET'])]
    public function show(Guide $guide): Response
    {
        return $this->render('admin_guide/show.html.twig', [
            'guide' => $guide,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_guide_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Guide $guide, GuideRepository $guideRepository): Response
    {
        $form = $this->createForm(GuideType::class, $guide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $guideRepository->save($guide, true);

            return $this->redirectToRoute('app_admin_guide_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_guide/edit.html.twig', [
            'guide' => $guide,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_guide_delete', methods: ['POST'])]
    public function delete(Request $request, Guide $guide, GuideRepository $guideRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $guide->getId(), $request->request->get('_token'))) {
            $guideRepository->remove($guide, true);
        }

        return $this->redirectToRoute('app_admin_guide_index', [], Response::HTTP_SEE_OTHER);
    }
}

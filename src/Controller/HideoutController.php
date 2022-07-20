<?php

namespace App\Controller;

use App\Entity\Hideout;
use App\Form\HideoutType;
use App\Repository\HideoutRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/hideout')]
class HideoutController extends AbstractController
{
    #[Route('/', name: 'app_hideout_index', methods: ['GET'])]
    public function index(HideoutRepository $hideoutRepository): Response
    {
        return $this->render('hideout/index.html.twig', [
            'hideouts' => $hideoutRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_hideout_new', methods: ['GET', 'POST'])]
    public function new(Request $request, HideoutRepository $hideoutRepository): Response
    {
        $hideout = new Hideout();
        $form = $this->createForm(HideoutType::class, $hideout);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hideoutRepository->add($hideout, true);

            return $this->redirectToRoute('app_hideout_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hideout/new.html.twig', [
            'hideout' => $hideout,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hideout_show', methods: ['GET'])]
    public function show(Hideout $hideout): Response
    {
        return $this->render('hideout/show.html.twig', [
            'hideout' => $hideout,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_hideout_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Hideout $hideout, HideoutRepository $hideoutRepository): Response
    {
        $form = $this->createForm(HideoutType::class, $hideout);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hideoutRepository->add($hideout, true);

            return $this->redirectToRoute('app_hideout_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hideout/edit.html.twig', [
            'hideout' => $hideout,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hideout_delete', methods: ['POST'])]
    public function delete(Request $request, Hideout $hideout, HideoutRepository $hideoutRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hideout->getId(), $request->request->get('_token'))) {
            $hideoutRepository->remove($hideout, true);
        }

        return $this->redirectToRoute('app_hideout_index', [], Response::HTTP_SEE_OTHER);
    }
}

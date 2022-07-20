<?php

namespace App\Controller;

use App\Entity\Mission;
use App\Form\MissionType;
use App\Repository\MissionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class MissionsController extends AbstractController
{
    #[Route('admin/missions', name: 'app_mission')]
    public function index(MissionRepository $missionRepository): Response
    {
        return $this->render('missions/index.html.twig', [
            'missions' => $missionRepository->findAll(),
        ]);
    }

    #[Route('admin/new', name: 'app_mission_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MissionRepository $missionRepository): Response
    {
        $mission = new Mission();
        $form = $this->createForm(MissionType::class, $mission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $missionRepository->add($mission, true);

            return $this->redirectToRoute('app_mission', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('missions/new.html.twig', [
            'mission' => $mission,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mission_show', methods: ['GET'])]
    public function show(Mission $mission): Response
    {
        return $this->render('missions/show.html.twig', [
            'mission' => $mission,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_mission_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Mission $mission, MissionRepository $missionRepository): Response
    {
        $form = $this->createForm(MissionType::class, $mission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $missionRepository->add($mission, true);

            return $this->redirectToRoute('app_mission', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('missions/edit.html.twig', [
            'mission' => $mission,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mission_delete', methods: ['POST'])]
    public function delete(Request $request, Mission $mission, MissionRepository $missionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $mission->getId(), $request->request->get('_token'))) {
            $missionRepository->remove($mission, true);
        }

        return $this->redirectToRoute('app_mission', [], Response::HTTP_SEE_OTHER);
    }
}


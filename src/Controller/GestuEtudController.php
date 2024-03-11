<?php

namespace App\Controller;

use App\Entity\GestuEtud;
use App\Form\GestuEtudType;
use App\Repository\GestuEtudRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestu/etud')]
class GestuEtudController extends AbstractController
{
    #[Route('/', name: 'app_gestu_etud_index', methods: ['GET'])]
    public function index(GestuEtudRepository $gestuEtudRepository): Response
    {
        return $this->render('gestu_etud/index.html.twig', [
            'gestu_etuds' => $gestuEtudRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_gestu_etud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $gestuEtud = new GestuEtud();
        $form = $this->createForm(GestuEtudType::class, $gestuEtud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($gestuEtud);
            $entityManager->flush();

            return $this->redirectToRoute('app_gestu_etud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('gestu_etud/new.html.twig', [
            'gestu_etud' => $gestuEtud,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_gestu_etud_show', methods: ['GET'])]
    public function show(GestuEtud $gestuEtud): Response
    {
        return $this->render('gestu_etud/show.html.twig', [
            'gestu_etud' => $gestuEtud,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_gestu_etud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, GestuEtud $gestuEtud, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GestuEtudType::class, $gestuEtud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_gestu_etud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('gestu_etud/edit.html.twig', [
            'gestu_etud' => $gestuEtud,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_gestu_etud_delete', methods: ['POST'])]
    public function delete(Request $request, GestuEtud $gestuEtud, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gestuEtud->getId(), $request->request->get('_token'))) {
            $entityManager->remove($gestuEtud);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_gestu_etud_index', [], Response::HTTP_SEE_OTHER);
    }
}

<?php

namespace App\Controller;

use App\Entity\Appartment;
use App\Form\AppartmentType;
use App\Repository\AppartmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/appartment')]
final class AppartmentController extends AbstractController{
    #[Route(name: 'app_appartment_index', methods: ['GET'])]
    public function index(AppartmentRepository $appartmentRepository): Response
    {
        return $this->render('appartment/index.html.twig', [
            'appartments' => $appartmentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_appartment_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $appartment = new Appartment();
        $form = $this->createForm(AppartmentType::class, $appartment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($appartment);
            $entityManager->flush();

            return $this->redirectToRoute('app_appartment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('appartment/new.html.twig', [
            'appartment' => $appartment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_appartment_show', methods: ['GET'])]
    public function show(Appartment $appartment): Response
    {
        return $this->render('appartment/show.html.twig', [
            'appartment' => $appartment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_appartment_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Appartment $appartment, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AppartmentType::class, $appartment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_appartment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('appartment/edit.html.twig', [
            'appartment' => $appartment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_appartment_delete', methods: ['POST'])]
    public function delete(Request $request, Appartment $appartment, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$appartment->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($appartment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_appartment_index', [], Response::HTTP_SEE_OTHER);
    }
}

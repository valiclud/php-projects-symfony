<?php

namespace App\Controller;

use App\Entity\Pagination;
use App\Form\PaginationType;
use App\Repository\PaginationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pagination')]
class PaginationController extends AbstractController
{
    #[Route('/', name: 'app_pagination_index', methods: ['GET'])]
    public function index(PaginationRepository $paginationRepository): Response
    {
        return $this->render('pagination/index.html.twig', [
            'paginations' => $paginationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pagination_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pagination = new Pagination();
        $form = $this->createForm(PaginationType::class, $pagination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pagination);
            $entityManager->flush();

            return $this->redirectToRoute('app_pagination_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pagination/new.html.twig', [
            'pagination' => $pagination,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pagination_show', methods: ['GET'])]
    public function show(Pagination $pagination): Response
    {
        return $this->render('pagination/show.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pagination_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pagination $pagination, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PaginationType::class, $pagination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_pagination_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pagination/edit.html.twig', [
            'pagination' => $pagination,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pagination_delete', methods: ['POST'])]
    public function delete(Request $request, Pagination $pagination, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pagination->getId(), $request->request->get('_token'))) {
            $entityManager->remove($pagination);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_pagination_index', [], Response::HTTP_SEE_OTHER);
    }
}

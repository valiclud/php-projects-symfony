<?php

namespace App\Controller;

use Doctrine\ORM\Tools\Pagination\Paginator;
use App\Entity\TranslatedText;
use App\Form\TranslatedTextType;
use App\Repository\TranslatedTextRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/translated/text')]
class TranslatedTextController extends AbstractController
{
    #[Route('/', name: 'app_translated_text_index', methods: ['GET'])]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $page = $request->get('page', 1);
        if($page <=0){
            $page = 1;
        }
        $limit = 2;
        $dql = "SELECT p FROM App\Entity\TranslatedText p ORDER BY p.id";
        $query = $entityManager->createQuery($dql)
                       ->setFirstResult($limit * ($page-1))
                       ->setMaxResults($limit);

        $paginator = new Paginator($query, fetchJoinCollection: true);
        $total = $paginator->count();
        $lastPage = (int) ceil($total / $limit);
        
        return $this->render('translated_text/index.html.twig', [
            'translated_texts' => $paginator,
            'total' => $total,
            'lastPage' => $lastPage,
        ]);

    }

    #[Route('/new', name: 'app_translated_text_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $translatedText = new TranslatedText();
        $form = $this->createForm(TranslatedTextType::class, $translatedText);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($translatedText);
            $entityManager->flush();

            return $this->redirectToRoute('app_translated_text_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('translated_text/new.html.twig', [
            'translated_text' => $translatedText,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_translated_text_show', methods: ['GET'])]
    public function show(TranslatedText $translatedText): Response
    {
        return $this->render('translated_text/show.html.twig', [
            'translated_text' => $translatedText,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_translated_text_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TranslatedText $translatedText, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TranslatedTextType::class, $translatedText);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_translated_text_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('translated_text/edit.html.twig', [
            'translated_text' => $translatedText,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_translated_text_delete', methods: ['POST'])]
    public function delete(Request $request, TranslatedText $translatedText, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$translatedText->getId(), $request->request->get('_token'))) {
            $entityManager->remove($translatedText);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_translated_text_index', [], Response::HTTP_SEE_OTHER);
    }
}

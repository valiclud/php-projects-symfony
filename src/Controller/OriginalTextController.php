<?php

namespace App\Controller;

/**declare(strict_types=1); */

use App\Entity\OriginalText;
use App\Form\OriginalTextType;
use App\Repository\OriginalTextRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/originaltext')]
class OriginalTextController extends AbstractController
{
    #[Route('/', 
    name: 'originaltext_index'
    )]
    public function index(OriginalTextRepository $originalTextRepository): Response
    {
        var_dump("I AM IN LIST METHOD");
        return $this->render('originaltext/index.html.twig', [
            //'controller_name' => 'OriginalTextController',
            'originaltexts' => $originalTextRepository->findAll(),
        ]);
    }

        /**
     * Displays a originalText informations.
     * @param \App\Entity\OriginalText $originalText the originalText.
     * @return \Symfony\Component\HttpFoundation\Response the response.
     */
    #[Route(
        '/show/{id}',
        name: 'originaltext_show',
        /** @infection-ignore-all */
        methods: ['GET']
    )]
    public function show(Request $request, int $id, OriginalTextRepository $originalTextRepository): Response
    {
        var_dump("I AM IN SHOW METHOD");
        if ($request->getMethod() == 'GET') {
            $originalText = $originalTextRepository->find($id);
          } else {
            $originalText = null;
          }
        return $this->render('originaltext/show.html.twig', [
            'originaltext' => $originalText,
        ]);
    }

    #[Route(
        '/new',
        name: 'originaltext_new',
        /** @infection-ignore-all */
        methods: ['GET', 'POST']
    )]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        var_dump("I AM IN NEW METHOD");
        $originalText = new OriginalText();
        $form = $this->createForm(OriginalTextType::class, $originalText);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($originalText);
            $entityManager->flush();

            return $this->redirectToRoute('originaltext_index');
        }
        

        return $this->render('originaltext/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route(
        '/delete/{id}',
        name: 'originaltext_delete',
        /** @infection-ignore-all */
        methods: ['GET', 'POST']
    )]
    public function delete(Request $request, int $id, OriginalTextRepository $originalTextRepository, EntityManagerInterface $entityManager): Response
    {
        $originalText = $originalTextRepository->find($id);
        $entityManager->remove($originalText);
        $entityManager->flush();
        return $this->redirectToRoute('originaltext_index');
    }


   #[Route(
        '/edit/{id}',
        name: 'originaltext_edit',
        methods: ['GET', 'POST']
    )]
    public function edit(Request $request, int $id, OriginalTextRepository $originalTextRepository, EntityManagerInterface $entityManager): Response
    {
        $originalText = $originalTextRepository->find($id);
        $form = $this->createForm(OriginalTextType::class, $originalText);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($originalText);
            $entityManager->flush();

            return $this->redirectToRoute('originaltext_index');
        }
        return $this->render('originaltext/edit.html.twig', [
            'originaltext' => $originalText,
            'form' => $form->createView(),
        ]);
    }


}

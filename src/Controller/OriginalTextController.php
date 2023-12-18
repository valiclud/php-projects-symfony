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
        '/{id}',
        name: 'originaltext_show',
        /** @infection-ignore-all */
        methods: ['GET']
    )]
    public function show(OriginalText $originalText): Response
    {
        return $this->render('originaltext/show.html.twig', [
            'originaltext' => $originalText,
        ]);
    }

    #[Route(
        '/{id}',
        name: 'originaltext_delete',
        /** @infection-ignore-all */
        methods: ['GET']
    )]
    public function delete(OriginalText $originalText): Response
    {
        return $this->redirectToRoute('originaltext_index');
    }


   #[Route(
        '/{id}/edit',
        name: 'originaltext_edit',
        methods: ['GET', 'POST']
    )]
    public function edit(Request $request, int $id, OriginalTextRepository $originalTextRepository): Response
    {
        if ($request->getMethod() == 'GET') {
            $originalText = $originalTextRepository->find($id);
          } else {
            $originalText = null;
          }

        $form = $this->createForm(OriginalTextType::class, $originalText);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $originalTextRepository->flush();

            return $this->redirectToRoute('originaltext_index');
        }
        return $this->render('originaltext/edit.html.twig', [
            'originaltext' => $originalText,
            'form' => $form->createView(),
        ]);
    }


}

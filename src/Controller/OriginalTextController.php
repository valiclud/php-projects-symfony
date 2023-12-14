<?php

namespace App\Controller;

use App\Entity\OriginalText;
use App\Form\OriginalTextType;
use App\Repository\OriginalTextRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        return $this->render('originaltext/index.html.twig', [
            //'controller_name' => 'OriginalTextController',
            'texts' => $originalTextRepository->findAll(),
        ]);
    }

        /**
     * Displays a product informations.
     * @param \App\Entity\OriginalText $product the product.
     * @return \Symfony\Component\HttpFoundation\Response the response.
     */
    #[Route(
        '/{id}',
        name: 'originaltext_show',
        /** @infection-ignore-all */
        methods: ['GET']
    )]
    public function show(OriginalText $text): Response
    {
        return $this->render('originaltext/show.html.twig', [
            'originaltext' => $text,
        ]);
    }

}

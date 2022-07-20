<?php

namespace App\Controller;

use App\Repository\QuoteRepository;
use App\templates\DeathNoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuoteController extends AbstractController {
    #[Route('/', name: 'index')]
    public function index(
        QuoteRepository $quoteRepository,
        DeathNoteRepository $noteRepository
    )
    : Response {

        return $this->render(
            'index.html.twig',
            [
                'quotes' => $quoteRepository->findAll(),
                'persons' => $noteRepository->findAll(),
            ]
        );
    }



    #[Route('/task3', name: 'task3')]
    public function task(

    )
    : Response {

        return $this->render(
            'quote/Hallo_time.php'
        );
    }
}


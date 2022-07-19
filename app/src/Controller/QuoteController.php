<?php

namespace App\Controller;

use App\Repository\QuoteRepository;
use App\Repository\DeathNoteRepository;
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
            'quote/index.html.twig',
            [
                'quotes' => $quoteRepository->findAll(),
                'persons' => $noteRepository->findAll(),
            ]
        );
    }

    #[Route('/death', name: 'death')]
    public function death(
        DeathNoteRepository $noteRepository
    )
    : Response {

        return $this->render(
            'quote/index_death.html.twig',
            [
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
            //'quote/Hallo_time.php'
        );
    }
}


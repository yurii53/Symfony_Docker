<?php

namespace App\Controller;

use App\Repository\QuoteRepository;
use App\Repository\DeathNoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;


class QuoteController extends AbstractController {
    #[Route('/', name: 'index')]
    public function index(
        QuoteRepository $quoteRepository,
        DeathNoteRepository $noteRepository
    )
    : Response
    {

        return $this->render(
            'index.html.twig',
            [
                'quotes' => $quoteRepository->findAll(),
                'persons' => $noteRepository->findAll(),
            ]
        );
    }

    #[Route('/api/quote/', name: 'index1')]
    public function index1(SerializerInterface $serializer,
        QuoteRepository $quoteRepository,
        DeathNoteRepository $noteRepository
    ): JsonResponse
    {


        //$a = $noteRepository->findAll();

        $serializer->serialize([1,2,3], 'json', [
            DateTimeNormalizer::FORMAT_KEY => 'Y-m-d H:i:s',
        ]);

        return new JsonResponse($serializer);
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







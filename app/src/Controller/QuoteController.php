<?php

namespace App\Controller;

use App\Repository\QuoteRepository;
use App\Repository\DeathNoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;


class QuoteController extends AbstractController {

    private Serializer $serializer;

    public function __construct(
    )

    {
        $encoders = [    new JsonEncoder()];
        $normalizer = new ObjectNormalizer();
        $normalizers = [$normalizer];
        $this->serializer  = new Serializer($normalizers, $encoders);
    }

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
    public function index1(
        QuoteRepository $quoteRepository,
        DeathNoteRepository $noteRepository
    ): Response
    {
        $response = $this->serializer->serialize($noteRepository->findAll(),'json', [
            AbstractNormalizer::ATTRIBUTES => ['name', 'bornYear']
        ]);
        /*var_dump($noteRepository->findAll()[1]);*/
        /*$quoteRepository->findAll() */
        return new Response($response,Response::HTTP_OK);
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
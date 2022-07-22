<?php

namespace App\Controller;

use App\Repository\QuoteRepository;
use App\Repository\DeathNoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;



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

    static function CamelCase(string $str): string
    {
        return str_replace(['-', '_', ' ', '"', ',', '.', ':', '{', '}', '/', '\\'], '', ucwords($str, " \"-_\t\r\n\f\v'"));
    }

    public function ManyToCamel(array $arr): array
    {
        $camel_arr = [];
        foreach($arr as $obj){
            array_push($camel_arr, $this->CamelCase(json_encode($obj)));
        }
        return $camel_arr;
    }

    #[Route('/api/quote/', name: 'index1')]
    public function index1(
        QuoteRepository $quoteRepository,
        DeathNoteRepository $noteRepository
    ): JsonResponse
    {


        return new JsonResponse(array($this->ManyToCamel($noteRepository->findAll()), $this->ManyToCamel($quoteRepository->findAll())));
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







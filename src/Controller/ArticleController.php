<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    private $em;
    private $articleRepository;

    public function __construct(EntityManagerInterface $em, ArticleRepository $articleRepository)
    {
        $this->em = $em;
        $this->articleRepository = $articleRepository;
    }

    #[Route('/article', methods: ['GET'], name: 'articles')]
    public function index(): Response
    {
        $articles = $this->articleRepository->findAll();

        return $this->render('articles/index.html.twig', [
            'articles' => $articles
        ]);
    }


    #[Route('/article{id}', methods: ['GET'], name: 'show')]
    public function show($id): Response
    {
        $article = $this->articleRepository->find($id);

        return $this->render('articles/show.html.twig', [
            'article' => $article
        ]);
    }
}

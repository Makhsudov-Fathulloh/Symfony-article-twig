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
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/article', name: 'article')]
    public function index(): Response
    /* Method 2 public function index(ArticleRepository $articleRepository): Response
     {
         $article = $articleRepository->findAll(); */
    {
        //Sql
        //findAll() - SELECT * FROM movies;
        //find() - SELECT * from movies WHERE id = 1;
        //findBy() - SELECT * FROM movies ORDER BY id DESC;
        //findOneBy() - SELECT * from movies WHERE id = 1 AND title = 'Lorem ipsum 2'
        //count() - SELECT COUNT(id) FROM movies

        /* $repository = $this->em->getRepository(Article::class);
        $article = $repository->findAll(); */

        //Commands
        //$article = $this->repository->findAll();
        //$article = $this->repository->find(1);
        //$article = $this->repository->findBy([], ['id' => 'DESC']);
        //$article = $this->repository->findOneBy(['id' => 1, 'title' => 'Lorem ipsum 2', []]);
        //$article = $this->repository->count([]);

        return $this->render('index.html.twig');
    }
}

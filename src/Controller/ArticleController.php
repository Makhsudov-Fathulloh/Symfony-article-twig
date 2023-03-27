<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleFormType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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


    #[Route('/articles/create', name: 'create_article')]
    public function create(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleFormType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newArticle = $form->getData();

            $imagePath = $form->get('image_path')->getData();
            if ($imagePath) {
                $newFileName = uniqid() . '.' . $imagePath->guessExtension();

                try {
                    $imagePath->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads',
                        $newFileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }

                $newArticle->setImagePath('/uploads/' . $newFileName);
            }

            $this->em->persist($newArticle);
            $this->em->flush();

            return $this->redirectToRoute('articles');
        }

        return $this->render('articles/create.html.twig', [
            'form' => $form->createView()
        ]);
    }


    #[Route('/articles/edit/{id}', name: 'edit_article')]
    public function edit($id, Request $request): Response
    {
        $article = $this->articleRepository->find($id);
        $form = $this->createForm(ArticleFormType::class, $article);

        $form->handleRequest($request);
        $imagePath = $form->get('image_path')->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            if ($imagePath) {
                if ($article->getImagePath() !== null) {
                    if (file_exists(
                        $this->getParameter('kernel.project_dir') . $article->getImagePath()
                    )) {
                        $this->getParameter('kernel.project_dir') . $article->getImagePath();
                    }
                    $newFileName = uniqid() . '.' . $imagePath->guessExtension();

                    try {
                        $imagePath->move(
                            $this->getParameter('kernel.project_dir') . '/public/uploads',
                            $newFileName
                        );
                    } catch (FileException $e) {
                        return new Response($e->getMessage());
                    }

                    $article->setImagePath('/uploads/' . $newFileName);
                    $this->em->flush();

                    return $this->redirectToRoute('articles');
                }
            } else {
                $article->setTitle($form->get('title')->getData());
                $article->setDescription($form->get('description')->getData());
                $article->setText($form->get('text')->getData());

                $this->em->flush();
                return $this->redirectToRoute('articles');
            }
        }

        return $this->render('articles/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView()
        ]);
    }


    #[Route('/articles/delete/{id}', methods: ['GET', 'DELETE'], name: 'delete_article')]
    public function delete($id): Response
    {
        $article = $this->articleRepository->find($id);
        $this->em->remove($article);
        $this->em->flush();

        return $this->redirectToRoute('articles');
    }


    #[Route('/articles/{id}', methods: ['GET'], name: 'show_article')]
    public function show($id): Response
    {
        $article = $this->articleRepository->find($id);

        return $this->render('articles/show.html.twig', [
            'article' => $article
        ]);
    }
}

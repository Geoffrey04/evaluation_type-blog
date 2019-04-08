<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


// Crud for Article Entity
/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{

            // List of Articles for CRUD
    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }


    // Create an Article with CRUD_Articles (Admin Only)
    /**
     * @Route("/new", name="article_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }


    // Display all Articles or one Article by id ( show )
    /**
     * @Route("/article_show", name="article_show", methods={"GET"})
     *
     */
    public function show(): Response
    {
        $repoArticle = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repoArticle->findAll();

        return $this->render('article/home.html.twig', [
            'articles' => $articles,
            'id_user' => $this->getUser()

        ]);
    }


    // Edit an Article from CRUD_Article ( Admin Only )
    /**
     * @Route("/edit/{id}", name="article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, $id): Response
    {
        $repoArticle = $this->getDoctrine()->getRepository(Article::class);
        $article = $repoArticle->find($id);

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_index', [
                'id' => $article->getId(),
            ]);
        }

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);

    }


        // Delete Article From CRUD_Articles ( Delete or in Edit )
    /**
     * @Route("/delete/{id}", name="article_delete", methods={"DELETE"})
     */
    public function delete(Request $request,$id): Response
    {
        $repoArticle = $this->getDoctrine()->getRepository(Article::class);
        $article = $repoArticle->find($id);

        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_index');
    }


}

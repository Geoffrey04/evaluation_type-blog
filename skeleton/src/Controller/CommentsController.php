<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comments;
use App\Form\CommentsType;
use App\Repository\CommentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comments")
 */
class CommentsController extends AbstractController
{
    /**
     * @Route("/", name="comments_index", methods={"GET"})
     */
    public function index(CommentsRepository $commentsRepository): Response
    {
        return $this->render('comments/index.html.twig', [
            'comments' => $commentsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="comments_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $comment = new Comments();
        $form = $this->createForm(CommentsType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('comments_index');
        }

        return $this->render('comments/new.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comments_show", methods={"GET"})
     */
    public function show(): Response
    {
        $repoComment = $this->getDoctrine()->getRepository(Comments::class);
        $comment = $repoComment->findAll();

        return $this->render('comments/show.html.twig', [
            'comment' => $comment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="comments_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, $id): Response
    {

        $repoComment = $this->getDoctrine()->getRepository(Comments::class);
        $comment = $repoComment->find($id);

        $form = $this->createForm(CommentsType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comments_index', [
                'id' => $comment->getId(),
            ]);
        }

        return $this->render('comments/edit.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comments_delete", methods={"DELETE"})
     */
    public function delete(Request $request, $id): Response
    {

        $repoComment = $this->getDoctrine()->getRepository(Comments::class);
        $comment = $repoComment->find($id);

        $repoArticle = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repoArticle->findAll();
        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_show', ['id' => $id,
                                                                  'articles' => $articles  ]);
    }
}

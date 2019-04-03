<?php


namespace App\Controller;




use App\Entity\Comments;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommentsController extends AbstractController
{
    /**
     * @param $articleid
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/article/{articleid}" , name="show_comments")
     */
public function show($articleid) {

    $repocomments = $this->getDoctrine()->getRepository(Comments::class);
    $comments = $repocomments->findBy(['Article' => $articleid]);
    return $this->render('article/home.html.twig', [
        'articleid' => $articleid,
        'comments' => $comments ,

    ]);

}
}



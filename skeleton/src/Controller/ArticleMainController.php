<?php


namespace App\Controller;




use App\Entity\Article;
use App\Entity\Comments;
use App\Entity\User;
use App\Form\CommentaryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



class ArticleMainController extends AbstractController
{

    /**
     * @Route("/articleMain/{id}" , name="show_articleMain")
     */
    public function show_article(Request $request, Article $article)
    {

        $repoArticle = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repoArticle->find($article);


        $repoCom = $this->getDoctrine()->getRepository(Comments::class);
        $comments = $repoCom->findBy(['id_art' => $article]);


        $repoUser = $this->getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();


        $com = new Comments();


        $form = $this->createForm(CommentaryType::class);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid())
        {

            $com->setIdArt($article);
            $emptymanager = $this->getDoctrine()->getManager();
            $emptymanager->persist($com);
            $emptymanager->flush();


            return $this->render('article/articleMain.html.twig', [  "form" => $form->createView()]);

        }


        return $this->render('article/articleMain.html.twig', [
            'articles' => $articles,
            'commentary' => $comments,
            'id_user' => $this->getUser(),
            'nickname' => $users ,
            "form" => $form->createView()



        ]);
    }





}






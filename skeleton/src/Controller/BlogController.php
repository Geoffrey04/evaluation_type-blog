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



class BlogController extends AbstractController
{


    // Function for display one article by ID
    // display all of his comments
    // and display and Send form_Comment
    /**
     * @Route("/articleMain/{id}" , name="show_articleMain")
     */
    public function show_article(Request $request, $id)
    {


        $article = $id;

        $repoArticle = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repoArticle->find($article);


        $repoCom = $this->getDoctrine()->getRepository(Comments::class);
        $comments = $repoCom->findBy(['art' => $article]);


        $repoUser = $this->getDoctrine()->getRepository(User::class);
        $users = $repoUser->findAll();






        $form = $this->createForm(CommentaryType::class);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid())
        {

            $com = new Comments();
            $contenu = $request->request->get('commentary')['contenu'];
            $com->setContenu($contenu);


            $com->setArt($articles);
            $com->setUser($this->getUser());
            $emptymanager = $this->getDoctrine()->getManager();
            $emptymanager->persist($com);
            $emptymanager->flush();






            return $this->redirectToRoute('show_articleMain', ['articles' => $articles,
                'commentary' => $comments,
                'id_user' => $this->getUser(),
                'nickname' => $users ,
                'id' =>   $id  ]);

        }




        return $this->render('article/articleMain.html.twig', [
            'articles' => $articles,
            'commentary' => $comments,
            'id_user' => $this->getUser(),
            'nickname' => $users ,
            "form" => $form->createView(),



        ]);
    }





}






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
            //dd($articles);
            $com = new Comments();
            $contenu = $request->request->get('commentary')['contenu'];
            $com->setContenu($contenu);
            // Tu faisais référence à l'id seulement ici
            // quand tu faisais $com->setArt($article)
            // (tu as défini $article au début de ta méthode)
            // Ce qu'il te fallait c'est l'entité complète qui correspond
            // à cet id que tu récupérais aussi plus haut en l'appelant $articles
            // C'était juste ça :p

            // Par contre t'as une nouvelle erreur dans ton twig après
            // la sauvegarde du commentaire
            $com->setArt($articles);
            $com->setUser($this->getUser());
            //dd($com);
            $emptymanager = $this->getDoctrine()->getManager();
            $emptymanager->persist($com);
            $emptymanager->flush();






            return $this->render('article/articleMain.html.twig', ['articles' => $articles,
                'commentary' => $comments,
                'id_user' => $this->getUser(),
                'nickname' => $users ,
                "form" => $form->createView()]);

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






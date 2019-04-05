<?php


namespace App\Controller;


use App\Entity\User;
use App\Form\UserControllerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



class UserController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/inscription" , name="inscription")
     *
     */
    public function inscription(Request $request)
    {
        $user = new User();


        $form = $this->createForm(UserControllerType::class , $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $user->setRole("user");
            $emptymanager = $this->getDoctrine()->getManager();
            $emptymanager->persist($user);
            $emptymanager->flush();

            return $this->redirectToRoute("article_show" , ["Form" => $form->createView()]);
        }
        return $this->render("article/connexion.html.twig" , ["form" => $form->createView()]);



    }


    /**
     * @Route("/login", name="login")
     */
    public function connexion(Request $request, AuthenticationUtils $authenticationUtils) : Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

       // dump($authenticationUtils);
       //  dump($error);

        return $this->render('article/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error


        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/", name="home_page")
     */

    public function check()
    {
        if(true == $this->get('security.authorization_checker')->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('article_show');
        }
        elseif (true == $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
        {
            return $this->redirectToRoute('article_show');
        }
    }

}




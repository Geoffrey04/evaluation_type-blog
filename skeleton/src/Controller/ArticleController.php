<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


class ArticleController
{
    /**
     * @return Response
     * @Route("/")
     */
    public function homepage(){

        return new Response("Ceci est un test");

    }

    /**
     * @return Response
     * @Route("/articles/{titre}")
     */
    public function show($titre) {

       return new Response("Mon super article ayant pour titre".' '.$titre .' '."s'affiche !");
    }
}
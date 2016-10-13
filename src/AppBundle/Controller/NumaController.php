<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
// to use the twig generator
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class NumaController extends Controller
{
    /**
     * @Route("/numa")
     */
    public function indexAction()
    {
         // /blog/my-blog-post
        $url =$this->generateUrl('blog_show', array('slug' => 'my-blog-post'), UrlGeneratorInterface::ABSOLUTE_URL);


        return $this->render('lucky/number.html.twig', array(
            'number' => $url,
        ));
    }

    /**
     * Matches /blog/*
     *
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function showAction($slug)
    {
        // $slug will equal the dynamic part of the URL
        // e.g. at /blog/yay-routing, then $slug='yay-routing'
        return $this->render('lucky/number.html.twig', array(
            'number' => $slug,
        ));
        // ...
    }
}

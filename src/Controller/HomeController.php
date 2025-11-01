<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    // #[Route('/welcome', name: 'app_welcome')] 
    // public function welcome(): Response 
    // return new Response ("Hello, world!"); // }

    #[Route('/home/{smia}/{age}',name: 'app_index',requirements: ['smia' => '\d+', 'age' => '\d+'])]
    public function index(int $smia = 1, int $age = 27): Response
    {
       return new Response("Hello " . $smia . " and your age is " . $age . " !");
    }
}

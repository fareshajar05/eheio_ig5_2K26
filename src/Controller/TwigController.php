<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TwigController extends AbstractController
{
    #[Route('/twig/{name}', name: 'app_twig')]
    public function index(string $name): Response
    {
        return $this->render('twig/index.html.twig', [
            'name' => $name,
        ]);
    }
}

<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    #[Route('/user-add', name: 'app_user_add')]
    public function addUser(Request $request): Response
    {
        $user = new User();
        $userForm = $this->createForm(UserType::class, $user);

        $userForm->handleRequest($request);
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            
            $user = $userForm->getData();
            dump($user);
            
            return $this->redirectToRoute('app_user');
        }

        return $this->render('user/add.html.twig', [
            'userForm' => $userForm->createView(),
        ]);
    }

}

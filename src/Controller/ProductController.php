<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/product-add', name: 'app_product_add')]
    public function addProduct(Request $request): Response
    {
        $product = new Product();
        $productForm = $this->createForm(ProductType::class, $product);

        return $this->render('product/add.html.twig', [
            'productForm' => $productForm->createView(),
        ]);
    }
}

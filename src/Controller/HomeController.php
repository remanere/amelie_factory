<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {

      $categories = $categoryRepository->findAll();
      $products = $productRepository->findBy(
              [],
              [
                  'id' => 'DESC'
              ],
              8
          );

      return $this->render('customer/home.html.twig',[
          'categories' => $categories,
          'products' => $products
      ]);
  }
}

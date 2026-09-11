<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AlchemyShopController extends AbstractController
{
    #[Route('/alchemy/shop', name: 'app_alchemy_shop')]
    public function index(): Response
    {
        return $this->render('alchemy_shop/index.html.twig', [
            'controller_name' => 'AlchemyShopController',
        ]);
    }

    #[Route('/alchemy/create', name: 'app_create_product')]
    public function CreateProducts()
    {
        
    }
}

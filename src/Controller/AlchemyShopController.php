<?php

namespace App\Controller;

use App\Entity\AlchemyProducts;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\Tests\Models\Enums\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AlchemyShopController extends AbstractController
{
    #[Route('/alchemy/shop/{id}', name: 'app_alchemy_shop')]
    public function index(?AlchemyProducts $product): Response
    {
        if ($product == null) {
            return new Response("Sorry I wasn't able to find the product");
        }

        return new Response($product->getDescription());
    }

    #[Route('/alchemy/create', name: 'app_create_product')]
    public function CreateProducts(EntityManagerInterface $entityManager): Response
    {
        $product = new AlchemyProducts();
        $product->setName("Levander");
        $product->setDescription("The violet lavender is used in many mysterious recipes....");
        $product->setPrice(470);
        $product->setQuantity(18);

        //doctrine knows we want this product eventually stored in the database
        // flush() executes the query
        $entityManager->persist($product);
        $entityManager->flush();

        return new Response('Saved new product with id' . $product->getId());
    }
}

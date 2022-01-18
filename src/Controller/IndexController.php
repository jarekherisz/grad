<?php

namespace App\Controller;

use Grad\UserBundle\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app')]
    public function index(ManagerRegistry $doctrine)
    {
        $products = $doctrine->getRepository(User::class)->findAll();

        var_dump($products);
        echo "po";
        die();
    }
}
<?php

namespace App\Controller;

use Grad\CoreBundle\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app')]
    public function index(ManagerRegistry $doctrine)
    {

    }
}
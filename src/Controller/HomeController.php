<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/project1', name: 'project_1')]
    public function project_1(): Response
    {
        return $this->render('projects/project_1.html.twig');
    }

    #[Route('/project2', name: 'project_2')]
    public function project_2(): Response
    {
        return $this->render('projects/project_2.html.twig');
    }
    #[Route('/project3', name: 'project_3')]
    public function project_3(): Response
    {
        return $this->render('projects/project_3.html.twig');
    }
    #[Route('/project4', name: 'project_4')]
    public function project_4(): Response
    {
        return $this->render('projects/project_4.html.twig');
    }
    #[Route('/project5', name: 'project_5')]
    public function project_5(): Response
    {
        return $this->render('projects/project_5.html.twig');
    }
}

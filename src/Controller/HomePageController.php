<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/home", name="home_page")
     */
    public function index(): Response
    {
        $user = $this->getUser();
        return $this->render('home_page/index.html.twig', [
            "user" => $user
        ]);
    }
}

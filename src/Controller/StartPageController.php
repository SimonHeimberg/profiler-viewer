<?php

namespace AppPV\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StartPageController extends AbstractController
{
    public function index()
    {
        return $this->render('start_page/index.html.twig', [
        ]);
    }
}

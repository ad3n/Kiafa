<?php

namespace AppBundle\Front;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        return new Response('Coming Soon');
    }
}
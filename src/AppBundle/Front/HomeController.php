<?php

namespace AppBundle\Front;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function indexAction(Request $request)
    {
        return new Response('Coming Soon');
    }
}
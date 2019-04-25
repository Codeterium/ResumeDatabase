<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function home()
    {
        return new Response('<h1>Maks, Symfony 4 meet you!</h1>');
    }
}
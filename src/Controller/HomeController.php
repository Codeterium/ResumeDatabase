<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Company;
use App\Entity\Reaction;
use App\Entity\Rezume;

class HomeController extends Controller
{
    public function home()
    {

        // vesion info
            //$symfony_version = \Symfony\Component\HttpKernel\Kernel::VERSION;
            //echo $symfony_version; 
        
        
        return new Response('<h1>Maks, Symfony 4 meet you!</h1>');
    }

    public function index()
    {
        $entityManager = $this
            ->getDoctrine()
            ->getManager();

        $companies = $entityManager
            ->getRepository(Company::class)
            ->findAll();

        $reactions = $entityManager
            ->getRepository(Reaction::class)
            ->findAll();

        $reactions_last = $entityManager
            ->getRepository(Reaction::class)
            ->findLastTen();


        $rezumes = $entityManager
            ->getRepository(Rezume::class)
            ->findAll();

        $rezumes_actual = $entityManager
            ->getRepository(Rezume::class)
            ->findActual();

        $r = [];
        if($rezumes)
        {
            foreach ($rezumes as $rezume) {

                $reactions_tmp = $entityManager
                    ->getRepository(Reaction::class)
                    ->findBy(['rezume' => $rezume->getId()])
                    ;

                if(count($reactions_tmp))
                {
                    $r[] = [
                            'title' => $rezume->getPosition(),
                            'reactions' =>$reactions_tmp
                    ];
                }


               
            }
        }

        return $this
            ->render('home.html.twig', [
                'companies'         => $companies,
                'reactions_last'    => $reactions_last,
                'reactions'         => $reactions,
                'rezumes'           => $rezumes,
                'rezumes_actual'    => $r,
            ]);

    }

}
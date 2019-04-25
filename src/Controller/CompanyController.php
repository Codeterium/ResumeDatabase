<?php

namespace App\Controller;

use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = $this->getDoctrine()
            ->getRepository(Company::class)
        ->findAll();

        dump($companies);

        return $this->render('company.html.twig', ['companies' => $companies]);
    }

    public function show($id)
    {
        $company = $this->getDoctrine()
            ->getRepository(Company::class)
            ->find($id);

        dump($company);

        return $this->render('company.html.twig', ['company' => $company]);
    }
}


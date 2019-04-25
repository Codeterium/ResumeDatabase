<?php

namespace App\Controller;

use App\Entity\Reaction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReactionController extends Controller
{
    public function index()
    {
        $reactions = $this->getDoctrine()
            ->getRepository(Reaction::class)
            ->findAll();

        dump($reactions);

        return $this->render('reaction.html.twig', ['reactions' => $reactions]);
    }


    public function show($id)
    {
        $reaction = $this->getDoctrine()
            ->getRepository(Reaction::class)
            ->find($id);

        dump($reaction->getCompany());

        return $this->render('reaction.html.twig', ['reaction' => $reaction]);
    }
}

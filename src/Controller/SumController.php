<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\SumType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SumController extends AbstractController
{
    /**
     * @Route("/", methods={"GET","POST"}, name="sum_show")
     */
    public function show(Request $request)
    {
        $form = $this->createForm(SumType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->dispatchMessage($form->getData());
        }

        return $this->render('base.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

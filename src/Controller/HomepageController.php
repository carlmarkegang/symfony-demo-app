<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\WebpageText;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {

        $WebpageTexts = $this->getDoctrine()->getRepository(WebpageText::class)->findAll();
        $WebpageTexts_array = [];
        foreach ($WebpageTexts as $WebpageText) {
            $WebpageTexts_array[$WebpageText->getName()] = $WebpageText->getText();
        }

        return $this->render('homepage.html.twig', [
            'WebpageTexts_array' => $WebpageTexts_array,

        ]);
    }
}

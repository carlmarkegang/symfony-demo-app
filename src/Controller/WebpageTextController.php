<?php

namespace App\Controller;

use App\Entity\WebpageText;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegistrationFormType;
use Doctrine\Persistence\ManagerRegistry;

class WebpageTextController extends AbstractController
{

    /**
     * @Route("/addnewtext", name="addnewtext") 
     */
    public function addnewtext(Request $request): Response
    {
        // Not logged in
        $user = $this->getUser();
        if(empty($user)){
            return $this->redirectToRoute('homepage');
        }

        if ($request->isMethod('POST')) {
            $WebpageText = new WebpageText(); 
            $this->getDoctrine()->getRepository(WebpageText::class)->saveWebpageText($WebpageText, $request->get('webpagetext_name'), nl2br($request->get('webpagetext_text')));
            return $this->redirectToRoute('addnewtext');
        }

        $WebpageTexts = $this->getDoctrine()->getRepository(WebpageText::class)->findAll();
        $WebpageTexts_array = [];
        foreach ($WebpageTexts as $WebpageText) {
            $WebpageTexts_array[$WebpageText->getName()] = $WebpageText->getText();
        }
        return $this->render('addnewtext.html.twig', [
            'WebpageTexts' => $WebpageTexts,
            'WebpageTexts_array' => $WebpageTexts_array,
        ]);
    }

        /**
     * @Route("/edit", name="edit") 
     */
    public function edit(Request $request): Response
    {
        // Not logged in
        $user = $this->getUser();
        if(empty($user)){
            return $this->redirectToRoute('homepage');
        }

        if ($request->isMethod('POST')) {
            $WebpageText = $this->getDoctrine()->getRepository(WebpageText::class)->findByName($request->get('webpagetext_name'));
            $this->getDoctrine()->getRepository(WebpageText::class)->saveWebpageText($WebpageText[0], $request->get('webpagetext_name'), $request->get('webpagetext_text'));
            return $this->redirectToRoute('edit');
        }

        $WebpageTexts = $this->getDoctrine()->getRepository(WebpageText::class)->findAll();
        $WebpageTexts_array = [];
        foreach ($WebpageTexts as $WebpageText) {
            $WebpageTexts_array[$WebpageText->getName()] = $WebpageText->getText();
        }
        return $this->render('edit.html.twig', [
            'WebpageTexts' => $WebpageTexts,
            'WebpageTexts_array' => $WebpageTexts_array,
        ]);
    }
}

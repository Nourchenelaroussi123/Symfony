<?php

namespace App\Controller;
use App\Form\ContactForumType; // import contactForumType 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\DTO\ContactDTO;
class HelloController extends AbstractController
{
    #[Route('/hello/{name}', name: 'app_hello')]
    public function index(Request $request,String $name): Response
    {
        //la creation d'un objet vide de type ContactDTO
        $data=new ContactDTO();
        //creation d'un formulaire de la class contact
        $form = $this->createForm(ContactForumType::class,$data);
        $form->handleRequest($request);
        // make my formulaire gere la requette 
        if($form->isSubmitted() && $form->isValid())
        {
            // recuperer les donner de formulaire
            dd($form->getData(),$data);
        }
      
        return $this->render('hello/index.html.twig',[
            'name'=> $name,
            'form'=> $form
    ]);
    } 
}

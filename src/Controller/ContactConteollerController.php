<?php

namespace App\Controller;

use App\DTO\ContactDTO; // Importe la classe ContactDTO
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; // Importe la classe AbstractController
use Symfony\Component\HttpFoundation\Response; // Importe la classe Response
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload; // Importe l'attribut MapRequestPayload
use Symfony\Component\Routing\Attribute\Route; // Importe l'attribut Route

class ContactConteollerController extends AbstractController // Déclare la classe ContactConteollerController qui étend AbstractController
{
    #[Route('/api/contact', name: 'app_contact_conteoller')] // Définit l'attribut de route pour gérer les requêtes POST vers /api/contact et attribue un nom à la route
    public function index(
        #[MapRequestPayload] // Utilise l'attribut MapRequestPayload pour mapper le corps de la requête vers l'objet ContactDTO
        ContactDTO $data // Déclare un paramètre $data de type ContactDTO
    ): Response // Indique que la méthode renvoie une instance de Response
    {
        return $this->json($data,context:['groups'=>['api:contact']]); 
    }   
}

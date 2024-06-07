<?php

namespace App\Controller;
use App\Form\ContactForumType; // import contactForumType 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\DTO\ContactDTO;
use App\Entity\Post;
use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\PostRepository;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class HelloController extends AbstractController
{
    #[Route('/hello/{name}', name: 'app_hello')]
    #[IsGranted('ROLE_USER')]
    public function index(Request $request,String $name,EntityManagerInterface $manager,PostRepository $repository ): Response
    {
        // $posts=new Post();
        // //EntityManagerInterface utilisée pour interagir avec les entités et la base de données dans Symfony
        // $posts->setCreatedAt(new \DateTimeImmutable());
        // $posts->setUpdatedAt(new \DateTimeImmutable());
        // $posts->setTitle('Mon premier Article');
        // $posts->setSlug('mon-premier-article');
        // // $post->setContent('Mon contenu est ecrit avec une idée en tete');
        // // // Enregistre l'objet $post dans la base de données
        // // $manager->persist($post);
        // // $manager->flush(); //insert dans la base de donnees
        // // // dd($manager);
        // //recuperer tout les donnees a partir de la base donnees :select * dans un tableau
        // // $posts=$manager->getRepository(Post::class)->findAll();
        // // $posts = $manager->getRepository(Post::class)->findBy(['slug' => 'mon-premier-article']);//chercher par slug (une valeur specifique)
        // // $posts = $manager->getRepository(Post::class)->findOrFailBySlug('mon-premier-article');//chercher par slug methode que j'ai defini dans postRepisotory
        // //ou 
        // // $posts = $repository->findOrFailBySlug('mon-premier-article');//chercher par slug methode que j'ai defini dans postRepisotory //par la declaration d'un repository
        // // $posts->setTitle('mon nouveau titre');
        // // $manager->remove($posts);//suprimer une entitee
        
        // $category1=new Category();
        // $category2=new Category();
        // $category3=new Category();
        // $category1->setName('Categorie #1 ');
        // $category2->setName('Categorie #2 ');
        // $category3->setName('Categorie #3 ');

        // $manager->persist($category1);
        // $manager->persist($category2);
        // $manager->persist($category3);
        // $posts = $repository->findOrFailBySlug('mon-premier-article');//chercher par slug methode que j'ai defini dans postRepisotory //par la declaration d'un repository
        // $posts->setCategory($category1);
        // $manager->flush();

        //ouuuuuuuuuuuuuuuuuuuuuu

        // $posts = $repository->findOrFailBySlug('mon-premier-article');//chercher par slug methode que j'ai defini dans postRepisotory //par la declaration d'un repository
        // dd($posts->getCategory()->getName(),$posts->getCategory());
        $posts = $repository->findAllWithCategory();//chercher par slug methode que j'ai defini dans postRepisotory //par la declaration d'un repository
        

        
        
        // dd($posts);//afficherrr
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
            'posts' => $posts, 
            'form'=> $form


    ]);
    } 
}

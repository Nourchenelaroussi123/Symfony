<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }


    public function findOrFailBySlug(string $slug): Post 
    {
        
     return $this->createQueryBuilder('p') //permet la construction de la requette 
    ->where('p.slug = :slug')
    ->setparameter('slug',$slug) 
    ->setMaxResults(1)//avoir une seul resultat
    ->getQuery()
    ->getSingleResult(); //recuperer le premier resultat 
    }
    public function findAllWithCategory(){
        return $this->createQueryBuilder('p') //permet la construction de la requette 
        ->join('p.category','c') //liaison sur la table category
        ->select('p','c') //selectionner tout ce qui est dans p et c
        ->getQuery()
        ->getResult();
    


    }

    //    /**
    //     * @return Post[] Returns an array of Post objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Post
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

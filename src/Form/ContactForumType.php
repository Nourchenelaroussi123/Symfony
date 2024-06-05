<?php
namespace App\Form;

use App\DTO\ContactDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactForumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Definition of the form
        $builder
            ->add('name')
            ->add('email') // Use TextType for single-line input
            ->add('message', TextareaType::class)
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure the ContactDTO class for the form
            'data_class' => ContactDTO::class,
        ]);
    }
}

<?php
namespace App\DTO;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
class ContactDTO
{
    #[Assert\Length(min: 3)]
    #[Groups(['api:contact'])]
    public string $name = '';
    // condition de validation 
     #[Assert\Email()]
    public string $email = '';
     
    #[Groups(['api:contact'])]
    public string $message = '';
}

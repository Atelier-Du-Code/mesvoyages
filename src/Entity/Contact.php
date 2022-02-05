<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Lenght;
/**
 * Description of Contact
 *
 * @author manon
 */
class Contact 
{
    /**      
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $nom;
    
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;
    
    /**
     * 
     * @var string|null
     * @Assert\NotBlank()
     */
    private $message;
    
    public function getNom(): ?string {
        return $this->nom;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function getMessage(): ?string {
        return $this->message;
    }

    public function setNom($nom) : self {
        $this->nom = $nom;
        return $this;
    }

    public function setEmail($email) : self{
        $this->email = $email;
        return $this;
    }

    public function setMessage($message) : self{
        $this->message = $message;
        return $this;
    }


}


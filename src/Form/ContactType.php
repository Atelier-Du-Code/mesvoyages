<?php


namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Optionsresolver;

/**
 * Description of ContactType
 *
 * @author manon
 */
class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('nom', TextType::class)
           ->add('email', TextType::class)
           ->add('message', TextareaType::class)
           ->add('submit', SubmitType::class, [
               'label' => 'Envoyer'
           ]);
    }
    
    public function configureOption(OptionResolver $resolver)
    {
        $resolver->setDefaults(['dataclass' => Contact::class]);
    }
}

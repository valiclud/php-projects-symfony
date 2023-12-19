<?php
// src/Form/OriginalTextType.php
/**declare(strict_types=1);*/

namespace App\Form;

use App\Entity\OriginalText;
use Doctrine\DBAL\Types\BlobType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Forms;

/**
 * A originaltext form.
 */
class OriginalTextType extends AbstractType
{
    // Methods :

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder the form builder.
     * @param array $options the options.
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('author', TextType::class)
            ->add('title', TextType::class)
            ->add('text', TextareaType::class, [
                'label'=> 'Text',
            ])
            ->add('textimg', FileType::class,array('data_class' => null))
            ->add('century', TextType::class)
            ->add('insertdate', DateType::class)
            ->add('hits', IntegerType::class)
            ->add('submit', SubmitType::class);


    }

}
<?php

namespace App\Form;

use App\Entity\OriginalText;
use App\Entity\TranslatedText;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TranslatedTextType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('author')
            ->add('title')
            ->add('text')
            ->add('language')
            ->add('insert_date')
            ->add('revision')
            ->add('originalText', EntityType::class, [
                'class' => OriginalText::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TranslatedText::class,
        ]);
    }
}

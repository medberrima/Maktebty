<?php

namespace App\Form;

use App\Entity\ThemeSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThemeSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('theme',EntityType::class,['class' => Theme::class,
            'choice_label' => 'nomth' ,
            'label' => 'Theme' ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ThemeSearch::class,
        ]);
    }
}

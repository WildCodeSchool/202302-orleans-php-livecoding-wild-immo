<?php

namespace App\Form;

use App\Entity\EstateSearch;
use App\Entity\Guide;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EstateSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setMethod('GET')
            ->add('search', SearchType::class, [
                'label' => 'Recherche',
                'required' => false,
            ])
            ->add('minPrice', NumberType::class, [
                'required' => false,
            ])
            ->add('maxPrice', NumberType::class, [
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
            'data_class' => EstateSearch::class
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}

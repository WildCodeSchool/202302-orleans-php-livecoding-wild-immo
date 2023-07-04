<?php

namespace App\Form;

use App\Entity\EstateSearch;
use App\Entity\EstateCategory;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
            ])
            ->add('localization', TextType::class, [
                'required' => false,
                'label' => 'Ville'
            ])
            ->add('radius', RangeType::class, [
                'required' => false,
                'label' => 'Rayon',
                'attr' => [
                    'min' => 1,
                    'max' => 300,
                ],
            ])
            ->add('estateCategory', EntityType::class, [
                'class' => EstateCategory::class,
                'choice_label' => 'name',
                'required' => false,
                'query_builder' => function (EntityRepository $entityRepository): QueryBuilder {
                    return $entityRepository->createQueryBuilder('ec')
                        ->orderBy('ec.name', 'ASC');
                },
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

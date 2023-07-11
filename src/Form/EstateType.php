<?php

namespace App\Form;

use App\Entity\Estate;
use Faker\Core\Number;
use App\Entity\Caracteristic;
use App\Entity\EstateCategory;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;
use App\Form\EstateCaracteristicType;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class EstateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('estateCategory', EntityType::class, [
                'class' => EstateCategory::class,
                'choice_label' => 'name',
                'query_builder' => function (EntityRepository $entityRepository): QueryBuilder {
                    return $entityRepository->createQueryBuilder('ec')
                        ->orderBy('ec.name', 'ASC');
                },
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre de l\'annonce',
                'attr' => [
                    'placeholder' => 'Maison de ville',
                ]
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Prix',
            ])
            ->add('surface', NumberType::class, [
                'help' => 'En m<sup>2</sup>',
                'help_html' => true,
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse',
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville'
            ])
            ->add('description', TextareaType::class)
            ->add('imageFile', VichFileType::class, [
                'required' => false,
            ])
            ->add('estateCaracteristics', CollectionType::class, [
                'entry_type' => EstateCaracteristicType::class
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Estate::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Estate;
use Faker\Core\Number;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class EstateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
            ->add('imageFile', VichFileType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Estate::class,
        ]);
    }
}

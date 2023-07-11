<?php

namespace App\Twig\Components;

use App\Entity\Estate;
use App\Form\EstateType;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\LiveCollectionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent('estateCaracteristicComponent')]
final class EstateCaracteristicComponent extends AbstractController
{
    use DefaultActionTrait;
    use LiveCollectionTrait;

    #[LiveProp(fieldName: 'formData')]
    public ?Estate $estate;

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(
            EstateType::class,
            $this->estate
        );
    }
}

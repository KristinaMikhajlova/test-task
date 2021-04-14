<?php

declare(strict_types=1);

namespace App\Form;

use App\DTO\SumMessage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Positive;

class SumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value1', IntegerType::class, [
                'required' => true,
                'constraints' => [
                    new Positive(),
                ],
                'label' => 'Value1: ',
            ])
            ->add('value2', IntegerType::class, [
                'required' => true,
                'constraints' => [
                    new Positive(),
                ],
                'label' => 'Value2: ',
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SumMessage::class,
        ]);
    }
}

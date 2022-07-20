<?php

namespace App\Form;

use App\Entity\Hideout;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class HideoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hideout_code_name')
            ->add('address')
            ->add('country', ChoiceType::class, [
                'choices' => [
                    'Belgium' => 'Belgium',
                    'Brazil' => 'Brazil',
                    'China' => 'China',
                    'Congo' => 'Congo',
                    'France' => 'France',
                    'Japan' => 'Japan',
                    'UK' => 'UK',
                    'USA' => 'USA',
                    'Russia' => 'Russia',
                    'Swiss' => 'Swiss',
                ]
            ])
            ->add('hideout_type', ChoiceType::class, [
                'choices' => [
                    'Observation' => 'Observation',
                    'Hotel' => 'Hotel',
                    'Flat' => 'Flat',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hideout::class,
        ]);
    }
}

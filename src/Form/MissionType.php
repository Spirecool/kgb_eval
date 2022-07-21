<?php

namespace App\Form;

use App\Entity\Mission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mission_code_name')
            ->add('title')
            ->add('description')
            ->add('mission_type', ChoiceType::class, [
                'choices' => [
                    'Surveillance' => 'Surveillance',
                    'Murder' => 'Murder',
                    'Infiltration' => 'Infiltration',
                    'Sabotage' => 'Sabotage',
                ]
            ])
            ->add('mission_status', ChoiceType::class, [
                'choices' => [
                    'In preparation' => 'In preparation',
                    'Current' => 'Current',
                    'Ended' => 'Ended',
                    'Failure' => 'Failure',
                ]
            ])
            ->add('start_date')
            ->add('end_date')
            ->add('contacts')




        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
        ]);
    }
}

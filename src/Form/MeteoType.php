<?php

namespace App\Form;

use App\Entity\Meteo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeteoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $builder
//            ->add('name')
//            ->add('weather_descriptions')
//            ->add('temperature')
//            ->add('humidity')
//            ->add('weather_icons')
//        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Meteo::class,
        ]);
    }
}

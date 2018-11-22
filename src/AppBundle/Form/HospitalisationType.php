<?php

namespace AppBundle\Form;

use AppBundle\Entity\Patient;
use AppBundle\Entity\Salle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HospitalisationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('codeHospitalisation')->add('montantHospitalisation')->
        add('patient',EntityType::class,array(
            'class'=>Patient::class,
            'choice_label'=>'nomComplet'
        ))->add('salle',EntityType::class,array(
            'class'=>Salle::class,
            'choice_label'=>'nomSalle'
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Hospitalisation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_hospitalisation';
    }


}

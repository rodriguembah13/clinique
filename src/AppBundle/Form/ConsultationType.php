<?php

namespace AppBundle\Form;

use AppBundle\Entity\Medecin;
use AppBundle\Entity\Patient;
use AppBundle\Entity\TypeConsultation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsultationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('datePrescription')->add('dateRealisation')->add('description')->
        add('medecin',EntityType::class,array(
            'class'=>Medecin::class,
            'choice_label'=>'nomComplet'
        ))->add('patient',EntityType::class,array(
            'class'=>Patient::class,
            'choice_label'=>'nomComplet'
        ))->add('typeConsultation',EntityType::class,array(
            'class'=>TypeConsultation::class,
            'choice_label'=>'designation'
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Consultation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_consultation';
    }


}

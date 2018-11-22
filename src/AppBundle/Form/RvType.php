<?php

namespace AppBundle\Form;

use AppBundle\Entity\CreneauxMedecin;
use AppBundle\Entity\Medecin;
use AppBundle\Entity\Patient;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RvType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateRendezVous')->
        add('patient',EntityType::class,array(
            'class'=>Patient::class,
            'choice_label'=>'nomComplet'
        ))->add('creneauxMedecin',EntityType::class,array(
            'class'=>CreneauxMedecin::class,
            'choice_label'=>'codeCrenneaux'
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Rv'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_rv';
    }


}

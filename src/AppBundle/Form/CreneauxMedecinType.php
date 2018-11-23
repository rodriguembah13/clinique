<?php

namespace AppBundle\Form;

use AppBundle\Entity\Medecin;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreneauxMedecinType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('codeCrenneaux')->add('heureDebut',null,array(
            'attr' => array(
                'placeholder' => 'EX 12:00')
        ))->add('heureFin',null,array(
            'attr' => array(
                'placeholder' => 'EX 13:30')
        ))->
        add('medecin',EntityType::class,array(
            'class'=>Medecin::class,
            'choice_label'=>'nomComplet'
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CreneauxMedecin'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_creneauxmedecin';
    }


}

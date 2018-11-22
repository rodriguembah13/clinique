<?php

namespace AppBundle\Form;

use AppBundle\Entity\Entreprise;
use AppBundle\Entity\Patient;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarteAbonneeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('codeCarte')->add('dateAbonnement')->
        add('patient',EntityType::class,array(
            'class'=>Patient::class,
            'choice_label'=>'nomComplet'
        ))->add('entreprise',EntityType::class,array(
        'class'=>Entreprise::class,
        'choice_label'=>'nomComplet'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CarteAbonnee'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_carteabonnee';
    }


}

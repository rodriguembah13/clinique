<?php

namespace AppBundle\Form;

use AppBundle\Entity\CreneauxMedecin;
use AppBundle\Entity\Medecin;
use AppBundle\Entity\Patient;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
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
        ))->add('medecin',EntityType::class,array(
            'class'=>Medecin::class,
            'placeholder'=>'select medecin',
            'mapped'=>false,
            'required'=>false,'choice_label'=>'nomComplet',
        ));
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();

                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                $crenneaux = $data->getCreneauxMedecin();
                $positions = null === $crenneaux ? array() : $crenneaux;

                $form->add('creneauxMedecin', EntityType::class, array(
                    'class' => 'AppBundle:creneauxMedecin',
                    'placeholder' => '',
                    'choices' => $positions,
                ));
            }
        );
        $builder->get('medecin')->addEventListener(FormEvents::POST_SUBMIT,function(FormEvent $event){
            /* dump($event->getForm());
             dump($event->getForm()->getData());*/
            $form=$event->getForm();
            $positions = null === $form->getData() ? array() : $form->getData()->getCrenneaux();
             $form->getParent()->add('creneauxMedecin',EntityType::class,array(
                 'class'=>CreneauxMedecin::class,
                 'placeholder'=>'select creneauxMedecin',
                 'required'=>false,
                 'choices'=> $positions
             ));
        });
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

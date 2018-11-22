<?php

namespace AppBundle\Form;

use AppBundle\Entity\Medecin;
use AppBundle\Entity\Patient;
use AppBundle\Entity\TechnicienLabo;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnalyseMedicaleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('code')->add('designation')->add('datePrescription')->add('dateRealisation')
                ->add('patient',EntityType::class,array(
                    'class'=>Patient::class,
                    'choice_label'=>'nomComplet',
                    'placeholder'=>'select patient',
                   'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.id', 'ASC');
                    },
                ))
                 ->
                 add('technicienLabo', EntityType::class, array(
                // looks for choices from this entity
                'class' => TechnicienLabo::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'nomComplet',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.id', 'ASC');
                    },
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ))
               /* ->add('patient', 'entity', array(
                'class' => 'AppBundle\Entity\Patient',
                'property' => 'patient',
                'mapped' => false,
                'required' => FALSE,
                'placeholder' => 'selectionnez un departement'
            ))*/;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AnalyseMedicale'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_analysemedicale';
    }


}

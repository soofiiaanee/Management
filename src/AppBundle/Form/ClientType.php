<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class,array('required'=>true,'mapped' => true,
                    'label' => false,'attr'=>array('required'=>false,'class'=>"form-control form-control-user",
                        "placeholder"=>"Nom"))) 
                ->add('prenom',TextType::class,array('required'=>true,'mapped' => true,
                    'label' => false,'attr'=>array('required'=>false,'class'=>"form-control form-control-user",
                        "placeholder"=>"Prénom")))
                ->add('societe',TextType::class,array('required'=>true,'mapped' => true,
                    'label' => false,'attr'=>array('required'=>false,'class'=>"form-control form-control-user",
                        "placeholder"=>"Société")))
                ->add('code',TextType::class,array('required'=>true,'mapped' => true,
                    'label' => false,'attr'=>array('required'=>false,'class'=>"form-control form-control-user",
                        "placeholder"=>"Code Client")))
                ->add('tel',TextType::class,array('required'=>false,'mapped' => true,
                    'label' => false,'attr'=>array('required'=>false,'class'=>"form-control form-control-user",
                        "placeholder"=>"Numéro de télephone")))
                ->add('email',TextType::class,array('required'=>false,'mapped' => true,
                    'label' => false,'attr'=>array('required'=>false,'class'=>"form-control form-control-user",
                        "placeholder"=>"Email")))
                ->add('adresse',TextType::class,array('required'=>false,'mapped' => true,
                    'label' => false,'attr'=>array('required'=>false,'class'=>"form-control form-control-user",
                        "placeholder"=>"Adresse")))
                ->add('siteWeb',TextType::class,array('required'=>false,'mapped' => true,
                    'label' => false,'attr'=>array('required'=>false,'class'=>"form-control form-control-user",
                        "placeholder"=>"Site Web")))
                ->add('sauvegarder', SubmitType::class,array('attr'=>array('class'=>"btn btn-primary btn-user btn-block")));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Client'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_client';
    }


}

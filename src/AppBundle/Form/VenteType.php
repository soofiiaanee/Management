<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class VenteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('creeLe', DateType::class, array(
                        'widget'=>'single_text',
                        'label' => "Date",
                        'html5' => true,
                        'required' => true,
                        'attr'=>array('required'=>true,'class'=>"form-control form-control-user")
                        ))
                ->add('elements', CollectionType::class , array(
                        'entry_type' => ElementVenteType::class,
                        'label' => 'Produits',
                        'allow_add'    => true,
                        'allow_delete' => true,
                        'by_reference' => false,
                        ))
                ->add('client',EntityType::class, [
                    'attr'=>array('required'=>true,'class'=>"form-control form-control-user"),
                    'error_bubbling' => true,
                    'label'=>'Client',
                    'class' => \AppBundle\Entity\Client::class,
                    'query_builder' => function (\AppBundle\Repository\ClientRepository $c) 
                                            {
                                                return $c->createQueryBuilder('c')
                                                ->orderBy('c.societe');
                                            },
                    'choice_label' => 'societe',
                    'required' => true,
                    ])
                ->add('Avance',NumberType::class,array('required'=>true,'mapped' => true,
                    'label' => 'Avance ( DH )','attr'=>array('required'=>false,'class'=>"form-control form-control-user")))
                ->add('sauvegarder', SubmitType::class,array('attr'=>array('class'=>"btn btn-primary btn-user btn-block")));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Vente'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_vente';
    }


}

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

class AchatType extends AbstractType
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
                        'entry_type' => ElementAchatType::class,
                        'label' => 'Produits',
                        'allow_add'    => true,
                        'allow_delete' => true,
                        'by_reference' => false,
                        ))
                ->add('fournisseur',EntityType::class, [
                    'attr'=>array('required'=>true,'class'=>"form-control form-control-user"),
                    'error_bubbling' => true,
                    'label'=>'Fournisseur',
                    'class' => \AppBundle\Entity\Fournisseur::class,
                    'query_builder' => function (\AppBundle\Repository\FournisseurRepository $f) 
                                            {
                                                return $f->createQueryBuilder('f')
                                                ->orderBy('f.societe');
                                            },
                    'choice_label' => 'societe',
                    'required' => false,
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
            'data_class' => 'AppBundle\Entity\Achat'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_achat';
    }


}

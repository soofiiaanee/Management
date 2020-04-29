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

class ElementVenteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('produit',EntityType::class, [
                    'attr'=>array('required'=>true,'class'=>"form-control form-control-user"),
                    'error_bubbling' => true,
                    'label'=>'Produit',
                    'class' => \AppBundle\Entity\Produit::class,
                    'query_builder' => function (\AppBundle\Repository\ProduitRepository $p) 
                                            {
                                                return $p->createQueryBuilder('p')
                                                ->orderBy('p.libelle');
                                            },
                    'choice_label' => function($p) {
                                        return $p->getLibelle().' : '.$p->getReference().' ( Stock : '.$p->getQuantite().' )';
                                    },
                    'required' => true,
                    ])
                ->add('quantite',NumberType::class,array('required'=>true,'mapped' => true,
                    'label' => 'Quantité','attr'=>array('required'=>false,'class'=>"form-control form-control-user","placeholder"=>"Quantité")))
                ->add('prix',NumberType::class,array('required'=>true,'mapped' => true,
                    'label' => 'Prix ( DH )','attr'=>array('required'=>false,'class'=>"form-control form-control-user","placeholder"=>"Prix Unitaire")));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ElementVente'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_elementvente';
    }


}

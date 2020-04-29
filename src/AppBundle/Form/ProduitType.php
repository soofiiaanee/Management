<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('libelle', TextType::class,array('required'=>true,'mapped' => true,
                    'label' => 'Libelle','attr'=>array('required'=>true,'class'=>"form-control form-control-user"))) 
                ->add('reference', TextType::class,array('required'=>true,'mapped' => true,
                    'label' => 'Référence','attr'=>array('required'=>true,'class'=>"form-control form-control-user"))) 
                ->add('prixAchat', NumberType::class,array('required'=>true,'mapped' => true,
                    'label' => "Prix d'achat",'attr'=>array('required'=>true,'class'=>"form-control form-control-user")))
                ->add('prixVente',NumberType::class,array('required'=>true,'mapped' => true,
                    'label' => 'Prix de vente','attr'=>array('required'=>true,'class'=>"form-control form-control-user")))
                ->add('type', EntityType::class,array('class' => \AppBundle\Entity\TypeProduit::class,'required'=>false,'attr'=>array('required'=>false,'class'=>"form-control form-control-user",
                            "placeholder"=>"Prix de vente")))
                ->add('marque', EntityType::class,array('class' => \AppBundle\Entity\Marque::class,'required'=>false,'attr'=>array('required'=>false,'class'=>"form-control form-control-user",
                            "placeholder"=>"Prix de vente")))
                ->add('quantite',NumberType::class,array('required'=>true,'mapped' => true,
                    'label' => 'Quantité en stock','attr'=>array('required'=>true,'class'=>"form-control form-control-user")))
                ->add('sauvegarder', SubmitType::class,array('attr'=>array('class'=>"btn btn-primary btn-user btn-block")));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_produit';
    }


}

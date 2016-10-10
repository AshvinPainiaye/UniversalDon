<?php

namespace Simplon\ActivitePartageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class DonsType extends AbstractType
{
  /**
  * @param FormBuilderInterface $builder
  * @param array $options
  */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
    ->add('titre')
    ->add('description')
    ->add(
    'categorie', ChoiceType::class, array(
      'choices' => array(
        'Electromenager' => 'Electromenager',
        'Immobilier' => 'Immobilier',
        'Jouet' => 'Jouet',
        'Multimedia' => 'Multimedia',
        'Vetement' => 'Vetement',
        'Autre' => 'Autre',
      ),
    ))
    ->add('imageFile', VichImageType::class, array('label' => ' ', 'required' => false))            
    ;
  }

  /**
  * @param OptionsResolver $resolver
  */
  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Simplon\ActivitePartageBundle\Entity\Dons'
    ));
  }
}

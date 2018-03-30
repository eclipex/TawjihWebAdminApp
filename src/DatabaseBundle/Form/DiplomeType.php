<?php

namespace DatabaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiplomeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('code')
                ->add('score')
                ->add('capacite')
                ->add('etablissement', EntityType::class,
                        array(
                            'class'=> 'DatabaseBundle:Etablissements',
                            'choice_label' =>'designation'
                        ))
                ->add('filiere', EntityType::class,
                        array(
                            'class'=> 'DatabaseBundle:Filieres',
                            'choice_label' =>'designation'
                        ))
                ->add('domaine', EntityType::class,
                        array(
                            'class'=> 'DatabaseBundle:Domaine',
                            'choice_label' =>'designation'
                        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DatabaseBundle\Entity\Diplome'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'databasebundle_diplome';
    }


}

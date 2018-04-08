<?php

namespace DatabaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
                'class'=> 'DatabaseBundle:Etablissement',
                'choice_label' =>'designation_etablissement'
                ))
                ->add('filiere', EntityType::class,
                array(
                'class'=> 'DatabaseBundle:Filiere',
                'choice_label' =>'designation_filiere'
                ))
                ->add('section', EntityType::class,
                array(
                'class'=> 'DatabaseBundle:Section',
                'choice_label' =>'designation_section'
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

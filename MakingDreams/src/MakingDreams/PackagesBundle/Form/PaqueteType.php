<?php

namespace MakingDreams\PackagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaqueteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion')
            ->add('precio')
            ->add('imagen')
            ->add('idHotel')
            ->add('idRestaurante')
            ->add('idUsuario')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MakingDreams\PackagesBundle\Entity\Paquete'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'makingdreams_packagesbundle_paquete';
    }
}

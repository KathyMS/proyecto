<?php

namespace MakingDreams\DestinationsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DestinoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('direccion')
            ->add('resenaHistorica')
            ->add('direccionMapa')
            ->add('provincia')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MakingDreams\DestinationsBundle\Entity\Destino'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'makingdreams_destinationsbundle_destino';
    }
}

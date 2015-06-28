<?php

namespace MakingDreams\HotelsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HotelRestauranteType extends AbstractType
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
            ->add('servicios')
            ->add('tipo')
            ->add('direccionMapa')
            ->add('provincia')
            ->add('destinoAsociado')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MakingDreams\HotelsBundle\Entity\HotelRestaurante'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'makingdreams_hotelsbundle_hotelrestaurante';
    }
}

<?php

namespace MakingDreams\RestaurantsBundle\Form;

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
            ->add('tipo', 'choice', array('choices' => array('1' => 'Restaurante', '2'=> 'Hotel'),
            'required'  => false))
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
            'data_class' => 'MakingDreams\RestaurantsBundle\Entity\HotelRestaurante'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'makingdreams_restaurantsbundle_hotelrestaurante';
    }
}

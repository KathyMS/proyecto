<?php

namespace MakingDreams\RestaurantsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImagenesDestino
 */
class ImagenesDestino
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $imagen1;

    /**
     * @var string
     */
    private $imagen2;

    /**
     * @var string
     */
    private $imagen3;

    /**
     * @var \MakingDreams\RestaurantsBundle\Entity\Destino
     */
    private $idDestino;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set imagen1
     *
     * @param string $imagen1
     * @return ImagenesDestino
     */
    public function setImagen1($imagen1)
    {
        $this->imagen1 = $imagen1;

        return $this;
    }

    /**
     * Get imagen1
     *
     * @return string 
     */
    public function getImagen1()
    {
        return $this->imagen1;
    }

    /**
     * Set imagen2
     *
     * @param string $imagen2
     * @return ImagenesDestino
     */
    public function setImagen2($imagen2)
    {
        $this->imagen2 = $imagen2;

        return $this;
    }

    /**
     * Get imagen2
     *
     * @return string 
     */
    public function getImagen2()
    {
        return $this->imagen2;
    }

    /**
     * Set imagen3
     *
     * @param string $imagen3
     * @return ImagenesDestino
     */
    public function setImagen3($imagen3)
    {
        $this->imagen3 = $imagen3;

        return $this;
    }

    /**
     * Get imagen3
     *
     * @return string 
     */
    public function getImagen3()
    {
        return $this->imagen3;
    }

    /**
     * Set idDestino
     *
     * @param \MakingDreams\RestaurantsBundle\Entity\Destino $idDestino
     * @return ImagenesDestino
     */
    public function setIdDestino(\MakingDreams\RestaurantsBundle\Entity\Destino $idDestino = null)
    {
        $this->idDestino = $idDestino;

        return $this;
    }

    /**
     * Get idDestino
     *
     * @return \MakingDreams\RestaurantsBundle\Entity\Destino 
     */
    public function getIdDestino()
    {
        return $this->idDestino;
    }
}

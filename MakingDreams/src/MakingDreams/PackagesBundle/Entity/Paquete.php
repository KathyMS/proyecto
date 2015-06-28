<?php

namespace MakingDreams\PackagesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paquete
 */
class Paquete
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var float
     */
    private $precio;

    /**
     * @var string
     */
    private $imagen;

    /**
     * @var \MakingDreams\PackagesBundle\Entity\HotelRestaurante
     */
    private $idHotel;

    /**
     * @var \MakingDreams\PackagesBundle\Entity\HotelRestaurante
     */
    private $idRestaurante;

    /**
     * @var \MakingDreams\PackagesBundle\Entity\Usuario
     */
    private $idUsuario;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Paquete
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Paquete
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Paquete
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     * @return Paquete
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set idHotel
     *
     * @param \MakingDreams\PackagesBundle\Entity\HotelRestaurante $idHotel
     * @return Paquete
     */
    public function setIdHotel(\MakingDreams\PackagesBundle\Entity\HotelRestaurante $idHotel = null)
    {
        $this->idHotel = $idHotel;

        return $this;
    }

    /**
     * Get idHotel
     *
     * @return \MakingDreams\PackagesBundle\Entity\HotelRestaurante 
     */
    public function getIdHotel()
    {
        return $this->idHotel;
    }

    /**
     * Set idRestaurante
     *
     * @param \MakingDreams\PackagesBundle\Entity\HotelRestaurante $idRestaurante
     * @return Paquete
     */
    public function setIdRestaurante(\MakingDreams\PackagesBundle\Entity\HotelRestaurante $idRestaurante = null)
    {
        $this->idRestaurante = $idRestaurante;

        return $this;
    }

    /**
     * Get idRestaurante
     *
     * @return \MakingDreams\PackagesBundle\Entity\HotelRestaurante 
     */
    public function getIdRestaurante()
    {
        return $this->idRestaurante;
    }

    /**
     * Set idUsuario
     *
     * @param \MakingDreams\PackagesBundle\Entity\Usuario $idUsuario
     * @return Paquete
     */
    public function setIdUsuario(\MakingDreams\PackagesBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \MakingDreams\PackagesBundle\Entity\Usuario 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}

<?php

namespace MakingDreams\LoginBundle\Entity;

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
     * @var \MakingDreams\LoginBundle\Entity\HotelRestaurante
     */
    private $idHotel;

    /**
     * @var \MakingDreams\LoginBundle\Entity\HotelRestaurante
     */
    private $idRestaurante;

    /**
     * @var \MakingDreams\LoginBundle\Entity\Usuario
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
     * @param \MakingDreams\LoginBundle\Entity\HotelRestaurante $idHotel
     * @return Paquete
     */
    public function setIdHotel(\MakingDreams\LoginBundle\Entity\HotelRestaurante $idHotel = null)
    {
        $this->idHotel = $idHotel;

        return $this;
    }

    /**
     * Get idHotel
     *
     * @return \MakingDreams\LoginBundle\Entity\HotelRestaurante 
     */
    public function getIdHotel()
    {
        return $this->idHotel;
    }

    /**
     * Set idRestaurante
     *
     * @param \MakingDreams\LoginBundle\Entity\HotelRestaurante $idRestaurante
     * @return Paquete
     */
    public function setIdRestaurante(\MakingDreams\LoginBundle\Entity\HotelRestaurante $idRestaurante = null)
    {
        $this->idRestaurante = $idRestaurante;

        return $this;
    }

    /**
     * Get idRestaurante
     *
     * @return \MakingDreams\LoginBundle\Entity\HotelRestaurante 
     */
    public function getIdRestaurante()
    {
        return $this->idRestaurante;
    }

    /**
     * Set idUsuario
     *
     * @param \MakingDreams\LoginBundle\Entity\Usuario $idUsuario
     * @return Paquete
     */
    public function setIdUsuario(\MakingDreams\LoginBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \MakingDreams\LoginBundle\Entity\Usuario 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}

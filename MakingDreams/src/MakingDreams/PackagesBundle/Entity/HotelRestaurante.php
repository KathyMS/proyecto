<?php

namespace MakingDreams\PackagesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HotelRestaurante
 */
class HotelRestaurante
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
    private $direccion;

    /**
     * @var string
     */
    private $servicios;

    /**
     * @var integer
     */
    private $tipo;

    /**
     * @var string
     */
    private $direccionMapa;

    /**
     * @var string
     */
    private $provincia;

    /**
     * @var \MakingDreams\PackagesBundle\Entity\Destino
     */
    private $destinoAsociado;


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
     * @return HotelRestaurante
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
     * Set direccion
     *
     * @param string $direccion
     * @return HotelRestaurante
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set servicios
     *
     * @param string $servicios
     * @return HotelRestaurante
     */
    public function setServicios($servicios)
    {
        $this->servicios = $servicios;

        return $this;
    }

    /**
     * Get servicios
     *
     * @return string 
     */
    public function getServicios()
    {
        return $this->servicios;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return HotelRestaurante
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set direccionMapa
     *
     * @param string $direccionMapa
     * @return HotelRestaurante
     */
    public function setDireccionMapa($direccionMapa)
    {
        $this->direccionMapa = $direccionMapa;

        return $this;
    }

    /**
     * Get direccionMapa
     *
     * @return string 
     */
    public function getDireccionMapa()
    {
        return $this->direccionMapa;
    }

    /**
     * Set provincia
     *
     * @param string $provincia
     * @return HotelRestaurante
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return string 
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set destinoAsociado
     *
     * @param \MakingDreams\PackagesBundle\Entity\Destino $destinoAsociado
     * @return HotelRestaurante
     */
    public function setDestinoAsociado(\MakingDreams\PackagesBundle\Entity\Destino $destinoAsociado = null)
    {
        $this->destinoAsociado = $destinoAsociado;

        return $this;
    }

    /**
     * Get destinoAsociado
     *
     * @return \MakingDreams\PackagesBundle\Entity\Destino 
     */
    public function getDestinoAsociado()
    {
        return $this->destinoAsociado;
    }
}

<?php

namespace MakingDreams\RestaurantsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Destino
 */
class Destino
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
    private $resenaHistorica;

    /**
     * @var string
     */
    private $direccionMapa;

    /**
     * @var string
     */
    private $provincia;


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
     * @return Destino
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
     * @return Destino
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
     * Set resenaHistorica
     *
     * @param string $resenaHistorica
     * @return Destino
     */
    public function setResenaHistorica($resenaHistorica)
    {
        $this->resenaHistorica = $resenaHistorica;

        return $this;
    }

    /**
     * Get resenaHistorica
     *
     * @return string 
     */
    public function getResenaHistorica()
    {
        return $this->resenaHistorica;
    }

    /**
     * Set direccionMapa
     *
     * @param string $direccionMapa
     * @return Destino
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
     * @return Destino
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
    
    public function __toString() {
        return $this->getNombre(). " ".$this->getProvincia();
    }
}

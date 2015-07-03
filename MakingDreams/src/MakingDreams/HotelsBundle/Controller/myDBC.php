<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of myDBC
 *
 * @author Calo
 */
class myDBC {

    public $mysqli = null;

    public function __construct() {

        include_once "dbconfig.php";
        $this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        if ($this->mysqli->connect_errno) {
            echo "Error MySQLi: (" & nbsp . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
            exit();
        }
        $this->mysqli->set_charset("utf8");
    }

    public function runQuery($qry) {
        $result = $this->mysqli->query($qry);
        return $result;
    }

    public function seleccionar_imagen_rest($tipo) {

        $q = 'SELECT imagenes_rest_hot.id,idImagenes_Rest_Hot as idImagenesRestHot, imagen1,imagen2,imagen3,
            hotel_restaurante.nombre, hotel_restaurante.servicios
            FROM making_dreams.imagenes_rest_hot, making_dreams.hotel_restaurante 
              where tipo=' . $tipo . ' and imagenes_rest_hot.idImagenes_Rest_Hot = hotel_restaurante.id;';

        $result = $this->mysqli->query($q);

        //Array asociativo que contendrá los datos
        $valores = array();

        if ($result->num_rows == 0) {
            echo'<script type="text/javascript">
                alert("ningun registro");
                </script>';
        } else {

            while ($row = mysqli_fetch_assoc($result)) {
                //Se crea un arreglo asociativo
                array_push($valores, $row);
            }
        }
        //Regresa array asociativo
        return $valores;
    }

    public function seleccionar_imagenenes_de_unrestaurante($id) {

        $q = 'SELECT imagenes_rest_hot.id,idImagenes_Rest_Hot as idImagenesRestHot, imagen1,imagen2,imagen3  
              FROM making_dreams.imagenes_rest_hot 
              where imagenes_rest_hot.idImagenes_Rest_Hot = ' . $id .';';

        $result = $this->mysqli->query($q);

        //Array asociativo que contendrá los datos
        $valores = array();

        if ($result->num_rows == 0) {
            echo'<script type="text/javascript">
                alert("ningun registro");
                </script>';
        } else {

            while ($row = mysqli_fetch_assoc($result)) {
                //Se crea un arreglo asociativo
                array_push($valores, $row);
            }
        }
        //Regresa array asociativo
        return $valores;
    }

}

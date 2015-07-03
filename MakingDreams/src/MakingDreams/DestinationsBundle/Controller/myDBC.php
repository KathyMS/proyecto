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

    public function seleccionar_imagen_rest() {

        $q = 'SELECT destino.id,id_destino as idDestino, imagen1,imagen2,imagen3,
                destino.nombre, destino.direccion, destino.resena_historica as resenaHistorica, 
                destino.direccion_mapa as direccionMapa, destino.provincia 
                FROM making_dreams.imagenes_destino, making_dreams.destino
                where destino.id = imagenes_destino.id_destino';

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

    public function seleccionar_restaurants_destino($provincia) {

        $q = 'SELECT hotel_restaurante.id, idImagenes_Rest_Hot as idImagenesRestHot,  
                imagen1,imagen2,imagen3,
                hotel_restaurante.nombre, hotel_restaurante.servicios
                FROM making_dreams.imagenes_rest_hot, making_dreams.hotel_restaurante
                where provincia like ' . $provincia . ' and hotel_restaurante.id = imagenes_rest_hot.idImagenes_Rest_Hot;';

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

<?php
class ConexionBD {
    public static function conexEnlace() {
        $enlaceConexion = new mysqli("localhost", "root", "", "utanianca",3306);
        return $enlaceConexion;
    }
}
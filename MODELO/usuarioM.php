<?php

include 'conexionBD.php';

class usuarioM{
    
    public function __construct() {
        $this->listado = array();
    }
    
    public function validarInicioSesionM($datosC){
        $usuario = $datosC['usuario'];
        $query = "SELECT*FROM USUARIO WHERE USER_USUARIO='$usuario'";
        $result = mysqli_query(conexionBD::conexEnlace(),$query);
        
        while ($row = mysqli_fetch_array($result)) {
            $this->listado[] = $row;
        }

        return $this->listado;
    }
    


    public function actualizarContraM($datosC,$tablaBD = 'usuario'){
        $enlaceConexion = ConexionBD::conexEnlace();
        $clave = mysql_entities_fix_string($enlaceConexion,$datosC['clave']);
        $correo =$_SESSION['correo'];
        $query="UPDATE $tablaBD
            SET USER_CONTRASENA = '$clave' WHERE EMAIL='$correo'";
        $result =  $enlaceConexion->query($query);
    }



    public function recuperarM($datosC,$tablaBD = 'usuario'){
        $enlaceConexion = ConexionBD::conexEnlace();
        $correo=$datosC['correo'];

        $query = "SELECT  *
                FROM $tablaBD WHERE EMAIL ='$correo'";
        $result =  $enlaceConexion->query($query);
        $row = $result->fetch_array(MYSQLI_NUM);
        return $row;
        
    }
   
    
    
    public function registroUsuarioM($datosC){
        $nombre = $datosC['nombre'];
        $apellido = $datosC['apellido'];
        $email = $datosC['email'];
        $usuario = $datosC['user'];
        $contrasena = $datosC['password'];
        
        $query = "INSERT INTO USUARIO (NOMBRES_USUARIO, APELLIDOS_USUARIO, EMAIL, FOTO, USER_USUARIO, USER_CONTRASENA) VALUES
            ('$nombre','$apellido','$email','sin_foto_perfil.jpg','$usuario','$contrasena')";

        $result = mysqli_query(conexionBD::conexEnlace(),$query);

        return $result;
    }
    
    
    
 
    public function actualizarFotoPerfil_M($datosC){
        $codigo = $datosC['cod_usuario'];
        $foto = $datosC['foto'];
        $query = "UPDATE USUARIO SET FOTO='$foto' WHERE COD_USUARIO='$codigo'";
        $result = mysqli_query(conexionBD::conexEnlace(),$query);
        return $result;
    }
    
}


function mysql_entities_fix_string($conexion, $string)
    {
        return htmlentities(mysql_fix_string($conexion, $string));
      }
    function mysql_fix_string($conexion, $string)
    {
        //if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);
      }
?>
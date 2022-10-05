<?php

class diarioM{
    public function __construct() {
        $this->listado = array();
    }


    public function listarDarioUsuarioM($datosC){
        $usuario = $datosC['usuario'];
        $query = "SELECT D.COD_DIARIO,D.COD_USUARIO,D.TITULO,D.CONTENIDO,D.FECHA_HORA,D.FOTO,E.COD_ESTADO_DIARIO,E.NOMBRES_USUARIO
                  FROM DIARIO D, ESTADO_DIARIO E WHERE E.COD_ESTADO_DIARIO=D.COD_ESTADO_DIARIO AND D.COD_ESTADO_DIARIO!=3
                  AND COD_USUARIO='$usuario' ORDER BY FECHA_HORA DESC";
        $result = mysqli_query(conexionBD::conexEnlace(),$query);
        
        while ($row = mysqli_fetch_array($result)) {
            $this->listado[] = $row;
        }
        return $this->listado;
    }
    
    
    public function listarDarioArchivadoUsuarioM($datosC){
        $usuario = $datosC['usuario'];
        $query = "SELECT D.COD_DIARIO,D.COD_USUARIO,D.TITULO,D.CONTENIDO,D.FECHA_HORA,D.FOTO,E.COD_ESTADO_DIARIO,E.NOMBRES_USUARIO
                  FROM DIARIO D, ESTADO_DIARIO E WHERE E.COD_ESTADO_DIARIO=D.COD_ESTADO_DIARIO AND D.COD_ESTADO_DIARIO=3
                  AND COD_USUARIO='$usuario' ORDER BY FECHA_HORA DESC";
        $result = mysqli_query(conexionBD::conexEnlace(),$query);
        
        while ($row = mysqli_fetch_array($result)) {
            $this->listado[] = $row;
        }
        return $this->listado;
    }
    
    
    public function listarNotaEditarM($datosC){
        $usuario = $datosC['usuario'];
        $codigo = $datosC['codigo'];
        $query = "SELECT*FROM DIARIO WHERE COD_USUARIO='$usuario' AND COD_DIARIO='$codigo'";
        $result = mysqli_query(conexionBD::conexEnlace(),$query);
        while ($row = mysqli_fetch_array($result)) {
            $this->listado[] = $row;
        }
        return $this->listado;
    }
    
    
    
    
    public function registroDiarioM($datosC){
        $codigo=$datosC['cod_usuario'];
        $titulo = $datosC['titulo'];
        $contenido = $datosC['contenido'];
        $fecha = $datosC['fecha'];
        $foto = $datosC['foto'];        
        $query = "INSERT INTO DIARIO(COD_USUARIO,COD_ESTADO_DIARIO,TITULO, CONTENIDO, FECHA_HORA, FOTO)
                    VALUES('$codigo',1,'$titulo','$contenido','$fecha','$foto')";
        $result = mysqli_query(conexionBD::conexEnlace(),$query);
        return $result;
    }
    

    

    public function eliminarDiarioM($datosC){
        $usuario =$datosC['usuario'];
        $codigo = $datosC['codigo'];
       
        $query = "DELETE FROM DIARIO WHERE COD_USUARIO='$usuario' AND COD_DIARIO='$codigo'";
        $result = mysqli_query(conexionBD::conexEnlace(),$query);
        return $result;
    }
    
    public function normalDiarioM($datosC){
        $usuario =$datosC['usuario'];
        $codigo = $datosC['codigo'];
       
        $query = "UPDATE DIARIO SET COD_ESTADO_DIARIO=1 WHERE COD_USUARIO='$usuario' AND COD_DIARIO='$codigo'";
        $result = mysqli_query(conexionBD::conexEnlace(),$query);
        return $result;
    }
    
    public function favoritoDiarioM($datosC){
        $usuario =$datosC['usuario'];
        $codigo = $datosC['codigo'];
       
        $query = "UPDATE DIARIO SET COD_ESTADO_DIARIO=2 WHERE COD_USUARIO='$usuario' AND COD_DIARIO='$codigo'";
        $result = mysqli_query(conexionBD::conexEnlace(),$query);
        return $result;
    }
    
    public function archivadoDiarioM($datosC){
        $usuario =$datosC['usuario'];
        $codigo = $datosC['codigo'];
       
        $query = "UPDATE DIARIO SET COD_ESTADO_DIARIO=3 WHERE COD_USUARIO='$usuario' AND COD_DIARIO='$codigo'";
        $result = mysqli_query(conexionBD::conexEnlace(),$query);
        return $result;
    }
    
    
    public function actualizarDiarioM($datosC){
        $usuario=$datosC['usuario'];
        $codigo=$datosC['codigo'];
        $titulo = $datosC['titulo'];
        $contenido = $datosC['contenido'];
        $fecha = $datosC['fecha'];
        $foto = $datosC['foto'];        
        $query = "UPDATE DIARIO SET TITULO='$titulo', CONTENIDO='$contenido', FECHA_HORA='$fecha', FOTO='$foto' WHERE COD_USUARIO='$usuario' AND COD_DIARIO='$codigo'";
        $result = mysqli_query(conexionBD::conexEnlace(),$query);
        return $result;
    }
}
?>
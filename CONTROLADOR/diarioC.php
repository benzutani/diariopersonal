<?php
require_once './MODELO/diarioM.php';

class diarioC{
    function __construct(){
        $this->diarioM = new diarioM();
    }
    
    

    function registrarDiarioC(){
        if(isset($_POST['registrar'])){
            try {
                $datosC =array();
                $datosC['cod_usuario'] = $_SESSION["COD_USUARIO"];
                $datosC['titulo'] = $_POST['titulo'];
                $datosC['contenido'] = $_POST['contenido'];
                $datosC['fecha'] = $_POST['fecha'];
                if (is_uploaded_file($_FILES["foto"] ["tmp_name"])) {                    
                    if (move_uploaded_file($_FILES["foto"] ["tmp_name"], "./VISTA/paginas/imagenDiario/" . $_FILES["foto"] ["name"])) {
                        $foto = $_FILES["foto"] ["name"];
                    }
                }
                $datosC['foto'] = $foto;
                $this->diarioM->registroDiarioM($datosC);
                return 1;
            } catch (Exception $ex) {
                return 0;
            }
        }
    }
    
    
    
   
    
    public function listarNotaEditarC(){
        if(isset($_GET["cod_diarioEditar"])){
            $datosC =array();
            $datosC['usuario'] = $_SESSION["COD_USUARIO"];
            $datosC['codigo'] = $_GET["cod_diarioEditar"];
            $result = $this->diarioM->listarNotaEditarM($datosC);
            return $result;
        }
    }
    
    public function actualizarDiarioC(){
        if(isset($_POST["actualizar"])){
            try {
                $datosC =array();
                $datosC['usuario'] = $_SESSION["COD_USUARIO"];
                $datosC['codigo'] = $_POST["codigo"];
                $datosC['titulo'] = $_POST["titulo"];
                $datosC['contenido'] = $_POST["contenido"];
                $datosC['fecha'] = $_POST["fecha"];

                if (is_uploaded_file($_FILES["foto"] ["tmp_name"])) {                    
                    if (move_uploaded_file($_FILES["foto"] ["tmp_name"], "./VISTA/paginas/imagenDiario/" . $_FILES["foto"] ["name"])) {
                        $foto = $_FILES["foto"] ["name"];
                    }
                }else{
                    $foto= $_POST["fotoHidden"];
                }
                $datosC['foto'] = $foto;

                $this->diarioM->actualizarDiarioM($datosC);                
                header("Location: index.php?ruta=notas");                
            } catch (Exception $ex) {
                return 0;
            }
        }
    }


    public function mostrarDiarioC(){
        $datosC =array();
        $datosC['usuario'] = $_SESSION["COD_USUARIO"];
        $result = $this->diarioM->listarDarioUsuarioM($datosC);
        return $result;
    }
    
    
    public function mostrarDiarioArchivadoC(){
        $datosC =array();
        $datosC['usuario'] = $_SESSION["COD_USUARIO"];
        $result = $this->diarioM->listarDarioArchivadoUsuarioM($datosC);
        return $result;
    }



    public function archivarDiarioC(){
        if(isset($_GET['cod_diarioArchivado'])){
            $datosC =array();
            $datosC['usuario'] = $_SESSION["COD_USUARIO"];
            $datosC['codigo'] = $_GET['cod_diarioArchivado'];
            
            $this->diarioM->archivadoDiarioM($datosC);
            header('location: index.php?ruta=notas');
        }
    }
    
    public function favoritoDiarioC(){
        if(isset($_GET['cod_diarioFavorito'])){
            $datosC =array();
            $datosC['usuario'] = $_SESSION["COD_USUARIO"];
            $datosC['codigo'] = $_GET['cod_diarioFavorito'];
            
            $this->diarioM->favoritoDiarioM($datosC);
            header('location: index.php?ruta=notas');
        }
    }
    
    public function normalDiarioC(){
        if(isset($_GET['cod_diarioNormal'])){
            $datosC =array();
            $datosC['usuario'] = $_SESSION["COD_USUARIO"];
            $datosC['codigo'] = $_GET['cod_diarioNormal'];
            
            $this->diarioM->normalDiarioM($datosC);
            header('location: index.php?ruta=notas');
        }
    }
    
    public function eliminarDiarioC($dato){
        if(isset($_GET['cod_diarioEliminar'])){
            $datosC =array();
            $datosC['usuario'] = $_SESSION["COD_USUARIO"];
            $datosC['codigo'] = $_GET['cod_diarioEliminar'];
            
            $this->diarioM->eliminarDiarioM($datosC);
            
            if($dato==1){
                header('location: index.php?ruta=notas');
            }else{
                header('location: index.php?ruta=archivados');
            }
            
        }
    }
}
?>
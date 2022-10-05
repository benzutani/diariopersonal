<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './MODELO/usuarioM.php';

class usuarioC {
    function __construct(){
        $this->usuarioM = new usuarioM();
    }

    function registrarUsuarioC(){
        if(isset($_POST['registroUsuarioV'])){
            
            $datosC =array();
            $datosC['nombre'] = $_POST['nombreUsuario'];
            $datosC['apellido'] = $_POST['apellidoUsuario'];
            $datosC['email'] = $_POST['emailUsuario'];
            $datosC['user'] = $_POST['usuario'];
            $datosC['password'] = password_hash($_POST['contrasenaUsuario1'],PASSWORD_DEFAULT);
            
            if($_POST['contrasenaUsuario1']===$_POST['contrasenaUsuario2']){
                return $this->usuarioM->registroUsuarioM($datosC);
            }else{
                return 0;
            }
                        
            
        }
    }
    
    public function recuperarC(){
        if(isset($_POST['correoR'])){
        $datosC=array();
        $datosC = array('correo' => $_POST['correoR']);
        
        if(($this->usuarioM->recuperarM($datosC)))
            {$row=$this->usuarioM->recuperarM($datosC);
            
            $datosC =array();   
            $longitud=rand(20, 50);
            $usuario = $row [1];
            $token=bin2hex(random_bytes(($longitud - ($longitud % 2)) / 2));
            $_SESSION['token']=$token;
            $_SESSION['correo']=$_POST['correoR'];
           header('location:index.php?ruta=verifica');
        }

        try{
                
            require 'phpMailer/src/PHPMailer.php';
            require 'phpMailer/src/SMTP.php';
            require 'phpMailer/src/Exception.php';
            
            $mail = new PHPMailer();
            //$headers .= "To: $mail\r\n";
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->SMTPAuth=true;
            $mail->Username='benzzulmer18@gmail.com';
            $mail->Password='dfrvpbgdezscwqsi';
            $mail->SMTPSecure= 'tls';
            $mail->Port=587;  // o 465

            $mail->setFrom('benzzulmer18@gmail.com','tu_diario_personal');
            $mail->addAddress($_POST['correoR'],'Restablecer contraseña');

            $mail->isHTML(true);
            $mail->Subject='Datos para acceso de cuenta.';


            $mail->Body= '
                            <html>
                                <body align="center">
                                    <center>
                                        <div>
                                            <img height="200px" src="https://st.depositphotos.com/57803962/56458/v/450/depositphotos_564587520-stock-illustration-book-web-icon-simple-illustration.jpg"/>
                                        </div>

                                        <div style="background-color: #3498DB; padding: 5px; width: 500px;border-radius: 10px;">
                                            <strong><p style="font-family: inherit; color: white">¿SE HA OLVIDADO SU CONTRASEÑA?</p></strong>
                                        </div>

                                        <div style="padding: 5px; width: 500px">
                                            <p style="font-family: inherit; color: black">Hola amig@ <strong>'.$usuario. '</strong></p>
                                            <p>¡Has solicitado para enviar tu contraseña!</p>
                                            <p> copia este link</p>
                                            <strong><p style="font-family: sans-serif;font-size: 30px; color: purple">'.$token.'</p></strong>
                                
                                        </div>

                                    </center>
                                </body>
                            </html>';
            $mail->send();

        } catch (Exception $e) {
           
        }
        }
    }


    public function actualizarContraC(){
        if(isset($_POST['claveV'])){
        if($_POST['claveV'] == $_POST['claveconfV']){
            $datosC =array();
            $pw_temp=($_POST['claveV']);
            $datosC['clave'] = password_hash($pw_temp,PASSWORD_DEFAULT);

            $result = $this->usuarioM->actualizarContraM($datosC);
         
            header("location: index.php?ruta=iniciarSesion");
            }
            else{
                echo "<script>
                M.toast({html: 'LAS CONTRASEÑAS INGRESADAS NO COINCIDEN, INTENTELO NUEVAMENTE'})
                </script>";
                return('location: index.php?ruta=actualizarcontra');
            }
        }

    }

    function actualizarFotoC(){
        if(isset($_POST['subirFoto'])){
            
            $datosC =array();
            $datosC['cod_usuario'] = $_SESSION["COD_USUARIO"];
            
            if (is_uploaded_file($_FILES["fotoUsuarioP"] ["tmp_name"])) {                    
                    if (move_uploaded_file($_FILES["fotoUsuarioP"] ["tmp_name"], "./VISTA/paginas/imagenUsuario/" . $_FILES["fotoUsuarioP"] ["name"])) {
                        $foto = $_FILES["fotoUsuarioP"] ["name"];
                    }
            }else{
                $foto='sin_foto_perfil.jpg';
            }
            $datosC['foto'] = $foto;
            
            return $this->usuarioM->actualizarFotoPerfil_M($datosC);
        }
    }
    

    public function verificaC(){
        if(isset($_POST['verificaR'])){
            $datosC = array();
            $datosC = array('token' =>$_POST['verificaR'] );
            $token= $datosC['token'];

            if ($_SESSION['token'] == $token){
                header("location: index.php?ruta=actualizarContraseña");
            }
            else{
                echo "<script>
                M.toast({html: 'Token Invalido'})
                </script>";
                return('location: index.php?ruta=verifica');
            }
        }
    }
    
    function loginUsuarioC(){
        
        if(isset($_POST['ingresarUsuario'])){
            
            $datosC =array();
            $datosC['usuario'] = $_POST['UserUsuario'];            
            $listaLogin=$this->usuarioM->validarInicioSesionM($datosC);
            
            if(sizeof($listaLogin)>0){
                if(password_verify($_POST["PasswordUsuario"], $listaLogin[0][6])){
                    $_SESSION["COD_USUARIO"]=$listaLogin[0][0];
                    $_SESSION["NOMBRE"]= $listaLogin[0][1];
                    $_SESSION["APELLIDO"]= $listaLogin[0][2];
                    $_SESSION["CORREO"]=$listaLogin[0][3];
                    $_SESSION["FOTO"]= $listaLogin[0][4];
                    $_SESSION["USER_NAME"]=$listaLogin[0][5];
                    $_SESSION["USER_PASSWORD"]=$listaLogin[0][6];
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }
    }
    

    
    
    
    function cerrarSession() {
        $_SESSION = array();
        setcookie(session_name(), '', time()-2592000, '/');
        session_destroy();
        header("location: index.php?ruta=index");
    }
    
    
 
}

?>
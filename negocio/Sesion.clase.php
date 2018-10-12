<?php

require_once '../datos/Conexion.clase.php';

/**
 * Description of Sesion
 *
 * @author laboratorio_computo
 */
class Sesion extends Conexion{
    private $usuario;
    private $clave;
    private $recordarUsuario;
    
    function getRecordarUsuario() {
        return $this->recordarUsuario;
    }

    function setRecordarUsuario($recordarUsuario) {
        $this->recordarUsuario = $recordarUsuario;
    }
    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

        function getClave() {
        return $this->clave;
    }

     function setClave($clave) {
        $this->clave = $clave;
    }
    
    public function validarSesion() {
        try {
            $sql = "select * from f_validar_sesion(:p_usuario,:p_clave)";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_usuario", $this->getUsuario());
            $sentencia->bindParam(":p_clave", $this->getClave());
            $sentencia->execute();
            return $sentencia->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function iniciarSesion() {
        try {
            $sql = "
                select
                        u.nombre,
                        u.clave,
                        u.activo
                from
                        usuario u 
                where
                        u.usuario = :p_usuario
                ";      
            //Creamos una sentencia
            $sentencia = $this->dblink->prepare($sql);
            
            //Vincular el parametro1 p_email con el valor del atribito usuario;
            $sentencia->bindParam(":p_usuario", $this->getUsuario());
            
            //ejecutar la sentencia
            $sentencia->execute();
            
            //Capturar el resultado que devuelve la sentencia
            $resultado = $sentencia->fetch();
            
            if ($resultado["clave"] ==  md5( $this->getClave() ) ){
                if ($resultado["estado"] == "false"){
                    //Usuario inactivo, NO puede ingresar a la app
                    return 0;
                }else{
                    //Usuario activo, Si puede ingresar a la app
                    session_name("Suyay");
                    session_start();
                    
                    $_SESSION["s_nombre"] = $resultado["nombre"];
                    
                    if ($this->getRecordarUsuario()=="S"){
                        //El usuario ha marcado el Check
                        setcookie("loginusuario", $this->getUsuario(), 0, "/");
                    }else{
                        setcookie("loginusuario", "", 0, "/");
                    }
                    
                    return 1;
                    
                }
                
            }else{
                //La clave ingresada por el usuario es diferente a la que esta grabada en la BD
                return 2;
            }
        
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }

}

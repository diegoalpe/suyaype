<?php

require_once '../datos/Conexion.clase.php';

class Usuario extends Conexion {
    private $id;
    private $clave;
    private $nombre;
    private $usuario;
    private $activo;
    
    function getId() {
        return $this->id;
    }

    function getClave() {
        return $this->clave;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getActivo() {
        return $this->activo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

            
    public function listar(){
        try {
            $sql = "SELECT 
                    usuario.id,
                    usuario.nombre,
                    usuario.usuario,
                    (case when usuario.activo = 'true' then 'ACTIVO' else 'INACTIVO' end) as estado
                  FROM 
                    public.usuario
                    ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }


    
    public function leerDatos($codigoPro) {
        try {
            $sql = "
                    select
                            *
                    from
                            provincia
                    where
                            codigo_provincia = :p_codigo_provincia
                ";
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_codigo_provincia", $codigoPro);
            $sentencia->execute();
            
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultado;
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function editar() {
        $this->dblink->beginTransaction();
        
        try {
           $sql = "     
                    UPDATE public.usuario
                        SET estado = :p_estado
                      WHERE codigo_usuario = :p_codigo_usuario;
               ";
           
           //Preparar la sentencia
            $sentencia = $this->dblink->prepare($sql);

            //Asignar un valor a cada parametro
            $sentencia->bindParam(":p_estado", $this->getEstado());

            //Ejecutar la sentencia preparada
            $sentencia->execute();
            
            
            $this->dblink->commit();
                
            return true;
            
        } catch (Exception $exc) {
           $this->dblink->rollBack();
           throw $exc;
        }
        
        return false;
            
    }
    
    public function agregar() {
        $this->dblink->beginTransaction();
        
        try {
            $sql = "select * from f_generar_correlativo('usuario') as nc";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            
            if ($sentencia->rowCount()){
                $nuevoCodigousuario = $resultado["nc"];
                $this->setCodigoUsuario($nuevoCodigousuario);
                
                $sql = "
                        INSERT INTO public.usuario(
                                codigo_usuario, 
                                codigo_agricultor, 
                                clave)
                        VALUES (
                                :p_codigo_usuario, 
                                :p_codigo_agricultor, 
                                :p_clave);
                    ";
                
                //Preparar la sentencia
                $sentencia = $this->dblink->prepare($sql);
                
                //Asignar un valor a cada parametro
                $sentencia->bindParam(":p_codigo_usuario", $this->getCodigoUsuario());
                $sentencia->bindParam(":p_codigo_agricultor", $this->getCodigoAgricultor());
                $sentencia->bindParam(":p_clave", $this->getClave());
                
                //Ejecutar la sentencia preparada
                $sentencia->execute();
                
                
                //Actualizar el correlativo en +1
                $sql = "update correlativo set numero = numero + 1 where tabla = 'usuario'";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->execute();
                
                $this->dblink->commit();
                
                return true; //significa que todo se ha ejecutado correctamente
                
            }else{
                throw new Exception("No se ha configurado el correlativo para la tabla usuario");
            }
            
        } catch (Exception $exc) {
            $this->dblink->rollBack(); //Extornar toda la transacción
            throw $exc;
        }
        
        return false;
            
    }
    
    public function eliminar( $p_codigo_provincia ){
        $this->dblink->beginTransaction();
        try {
            $sql = "delete from provincia where codigo_provincia = :p_codigo_provincia";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_codigo_provincia", $p_codigo_provincia);
            $sentencia->execute();
            
            $this->dblink->commit();
            
            return true;
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }
        
        return false;
    }
    
}

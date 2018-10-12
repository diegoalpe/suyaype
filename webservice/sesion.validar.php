<?php

require_once '../negocio/Sesion.clase.php';
require_once '../util/funciones/Funciones.clase.php';

if (! isset($_POST["usuario"]) || ! isset($_POST["clave"])){
    Funciones::imprimeJSON(500, "Falta completar los datos requeridos", "");
    exit();
}

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];


try {
    $objsesion = new Sesion;
    $objsesion->setUsuario($usuario);
    $objsesion->setClave($clave);
    $resultado = $objsesion->validarSesion();


    if ($resultado ["estado"] == 200) {
        unset($resultado["estado"]);
        //generar token
        require_once './token.generar.php';
        $token = generarToken(null,3600);
        $resultado ["token"] = $token;
        //generar token
        
        Funciones::imprimeJSON(200, "Hola", $resultado);
    } else {
        Funciones::imprimeJSON(500, $resultado["dato"], "");
    }
} catch (Exception $exc) {

    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}
<?php

require_once '../negocio/Provincia.clase.php';
require_once '../util/funciones/Funciones.clase.php';

if (! isset($_POST["p_codigo_provincia"]) ){
    Funciones::imprimeJSON(500, "Faltan parametros", "");
    exit();
}

try {
    $objProvincia = new Provincia();
    $codigoPro = $_POST["p_codigo_provincia"];
    $resultado = $objProvincia->leerDatos($codigoPro);
    
    Funciones::imprimeJSON(200, "", $resultado);
    
} catch (Exception $exc) {
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}



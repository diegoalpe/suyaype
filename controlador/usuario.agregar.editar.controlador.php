<?php

require_once '../negocio/Usuario.clase.php';
require_once '../util/funciones/Funciones.clase.php';

if (! isset($_POST["p_datosFormulario"]) ){
    Funciones::imprimeJSON(500, "Faltan parametros", "");
    exit();
}

$datosFormulario = $_POST["p_datosFormulario"];

//Convertir todos los datos que llegan concatenados a un array
parse_str($datosFormulario, $datosFormularioArray);

//print_r($datosFormularioArray);
//exit();

try {
    $objUsuario = new Usuario();
    $objUsuario->setCodigoAgricultor( $datosFormularioArray["cboagricultormodal"] );
    $cl = ( $datosFormularioArray["txtclave"] );
    $clmd5 = md5($cl);
    $objUsuario->setClave($clmd5);
    
    if ($datosFormularioArray["txttipooperacion"]=="agregar"){
        $resultado = $objUsuario->agregar();
        if ($resultado==true){
            Funciones::imprimeJSON(200, "Grabado correctamente", "");
        }
    }else{
        $objUsuario->setCodigoUsuario( $datosFormularioArray["txtcodigo"] );
        
        $resultado = $objUsuario->editar();
        if ($resultado==true){
            Funciones::imprimeJSON(200, "Grabado correctamente", "");
        }
    }
    
} catch (Exception $exc) {
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}

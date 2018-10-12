<?php

session_name("suyay");
session_start();

if (! isset( $_SESSION["s_nombre"] ) ){
    //Esto se cumple cuando el usuario no ha iniciado sesión
    header("location:index.php");
    exit;
}

//Capturando los datos del usuario que ha iniciado sesión
$nombreUsuario = ucwords( strtolower($_SESSION["s_nombre"]) );



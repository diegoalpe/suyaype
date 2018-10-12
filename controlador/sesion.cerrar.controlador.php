<?php

    session_name("Suyay");
    session_start();
    
    unset($_SESSION["s_nombre"]);
    
    session_destroy();
    
    header("location:../vista/index.php");
<?php

require_once '../util/jwt/vendor/autoload.php';
require_once '../util/jwt/auth.php';


function generarToken($data=null, $timeToken=36000){
    return Auth::SignIn($data, $timeToken);
}

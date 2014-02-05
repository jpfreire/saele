<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$config_array = parse_ini_file("saele.ini");

foreach ($config_array as $configuracao => $valor){
    define(strtoupper($configuracao),$valor);
}




//define('SERVIDOR_LDAP',$config_array["servidor_ldap"]);
//define('PORTA_LDAP',   $config_array["porta_ldap"]);
//define('SUFIXO_RDN_LOGIN',   $config_array["sufixo_rdn_login"]);

?>


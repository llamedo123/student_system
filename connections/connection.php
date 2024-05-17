<?php
    function connection() {


    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'login_system';

    $cons = new mysqli($host, $username, $password, $database);

    if($cons->connect_error){
        echo $cons->connect_error;
    } else {
        return $cons;
    }


    }
?>
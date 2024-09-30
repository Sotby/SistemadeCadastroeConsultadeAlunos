<?php
    $db = "escola";
    $server="localhost";
    $user="Sotby";
    $pass=142536;
    $port = 3307;

    $conn = new mysqli($server,$user,$pass,$db,$port);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

?>

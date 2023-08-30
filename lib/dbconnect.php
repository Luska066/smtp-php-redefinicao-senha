<?php
    $host = '127.0.0.1';
    $user = 'root';
    $password = '15935765';
    $port = "3306";
    $banco = 'smtp_teste';

    $con = new mysqli($host,$user,$password,$banco);

    if(mysqli_connect_errno()){
        exit('Erro ao conectar-se com o banco de dados'.mysqli_connect_error());
    }
?>
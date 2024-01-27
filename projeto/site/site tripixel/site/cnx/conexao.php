<?php
    $host = 'localhost';
    /*
    $banco = 'id21552163_bdtripixel';
    $usuario = 'id21552163_devs';
    $senha = 'Elevador#242930SenhaBanco';
    */
    $banco = 'bdtripixel';
    $usuario = 'root';
    $senha = '';

    try
    {
        $conexao = new PDO("mysql:host=$host; dbname=$banco", "$usuario", "$senha");
        $conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao -> exec("set names utf8");
    }
    catch(PDOException $erroBanco)
    {
        echo("Erro na conexão: " . $erroBanco -> getMessage());
    }
?>
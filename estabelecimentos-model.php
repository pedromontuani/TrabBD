<?php

function getEstabelecimentos()
{
    include("./config.php");
    $con = mysqli_connect($host, $login, $senha, $bd);
    $sql = "SELECT * FROM Estabelecimento WHERE 1";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getNomeEstabelecimento($cnpj)
{
    include("./config.php");
    $con = mysqli_connect($host, $login, $senha, $bd);
    $sql = "SELECT nome FROM Estabelecimento WHERE cnpj = ". $cnpj;
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_row($result)[0];
}

function getCardapio($cnpj)
{
    include("./config.php");
    $con = mysqli_connect($host, $login, $senha, $bd);
    $sql = "SELECT * FROM Produto WHERE cnpj = ". $cnpj . " ORDER BY nome";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
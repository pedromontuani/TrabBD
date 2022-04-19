<?php

function getUsuarios()
{
    include("./config.php");
    $con = mysqli_connect($host, $login, $senha, $bd);
    $sql = "SELECT * FROM Usuário WHERE 1 ORDER BY nome";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
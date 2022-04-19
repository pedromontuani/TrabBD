<?php

function getAllPedidos() {
    include("./config.php");
    $con = mysqli_connect($host, $login, $senha, $bd);
    $sql = "SELECT p.numero as numero, p.data as data, p.horarioEntrega as horarioEntrega, e.nome as entregador, c.nome as cliente FROM Pedido as p JOIN Usuário as e ON p.cpfEntregador = e.cpf JOIN Usuário AS c ON c.cpf = p.cpfCliente WHERE 1";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>

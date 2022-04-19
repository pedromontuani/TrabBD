<?php
header("Content-Type: text/html; charset=utf-8", true);
?>
<html lang="pt-Br">

<head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <title>Hello, world!</title>
</head>

<body>
    <div class="container pt-3">
        <?php
        include('./header.php');
        ?>

        <div class="row mt-4">
            <div class="col-md-12">
                <h1>Pedidos</h1>
            </div>
        </div>

        <div class="row mt-3">
            <div class="row col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Data do pedido</th>
                            <th scope="col">Horário da entrega</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Entregador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('./pedidos-model.php');
                        $rows = getAllPedidos();
                        for ($i = 0; $i < count($rows); $i++) {
                            $date = date_create($rows[$i]['data']);
                            $hour = date_create($rows[$i]['horarioEntrega']);
                            echo ('<tr>' .
                                '<th scope="row">' . $rows[$i]['numero'] . '</th>' .
                                '<td>' . date_format($date, "d/m/Y") . '</td>' .
                                '<td>' . date_format($hour, "H:i:s") . '</td>' .
                                '<td>' . $rows[$i]['cliente'] . '</td>' .
                                '<td>' . $rows[$i]['entregador'] . '</td>' .
                                '</tr>'
                            );
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
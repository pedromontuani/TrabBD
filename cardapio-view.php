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
                <h1>Cardápio</h1>
                <?php
                include_once('./estabelecimentos-model.php');
                $cnpj = $_GET['cnpj'];
                $nome = getNomeEstabelecimento($cnpj);
                echo ('<h2 class="mt-3">' . $nome . '</h2>');
                ?>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <ul class="list-group">
                    <?php
                    include_once('./estabelecimentos-model.php');
                    $cnpj = $_GET['cnpj'];
                    $rows = getCardapio($cnpj);
                    if (count($rows)) {
                        for ($i = 0; $i < count($rows); $i++) {
                            echo ('<li class="list-group-item">' .
                                $rows[$i]['nome'] . ' - R$' .
                                number_format($rows[$i]['preco'], 2, ',', '.') .
                                '</li>'
                            );
                        }
                    } else {
                        echo ('<p>Nenhum registro encontrado.</p>');
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
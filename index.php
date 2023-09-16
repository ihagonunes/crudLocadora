<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include "conn.php";
        $air_seach = $_POST['seach'];
        $air_sql = "SELECT * FROM filme WHERE nome LIKE '%$air_seach%'";
        $air_result = mysqli_query($air_conn, $air_sql);
    } else {
        include "conn.php";
        $air_sql = "SELECT * FROM filme";
        $air_result = mysqli_query($air_conn, $air_sql);
        if (!$air_result) {
            die("Erro na consulta: " . mysqli_error($air_conn));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="css\index.css">


    <title>INSULFILM</title>
</head>

<body>
    <!-- Header -->
    <nav class="navbar">
            <a class="navbar-brand" href="index.php"><img src="css/insulfilm.png" alt="Insulfilm"></a>
            <form role="search" method="POST">
                <input class="search" type="search" placeholder="Search" name="seach" aria-label="Search">
                <button class="buttonSearch" type="submit"><img class="searchIcon" src="css/icons8-search-50.png" alt="Search"></button>
            </form>
    </nav>

    <!-- Itens -->
    <div class=" container">
        <div class="menu superiormenu">
            <?php
                while ($air_row = mysqli_fetch_assoc($air_result)) {

                echo "<div class='menu'> <div class='movie'>";

                    echo "<div class='poster' style='background-image: url({$air_row['imagem']})' alt='{$air_row['nome']}'>
                            <div class='teste'>{$air_row['descricao']}</div>
                    </div>";

                    echo "<div class='description'>
                            <h1>{$air_row['nome']}</h1>
                            <h2>R$ {$air_row['valor']}</h2>
                    </div>";

                    echo "<div class='buttons'>
                            <a class='sell' href=\"filme_vender.php?id={$air_row['codigo']}\">Vender</a>
                            <a class='add' href=\"filme_adicionar.php?id={$air_row['codigo']}\">Adicionar</a>
                            <a class='edit' href=\"filme_editar.php?id={$air_row['codigo']}\">Editar</a>
                            <a class='exclude' href=\"filme_excluir.php?id={$air_row['codigo']}\">Excluir</a>
                    </div>";

                echo "</div> </div>";
                }
            ?>
        </div>
        
        <a href="./filme_registrar.php" class="register">Registrar Filme</a>
    </div>

</body>

</html>
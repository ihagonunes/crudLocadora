<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include "conn.php";
        $seach = $_POST['seach'];
        $sql = "SELECT * FROM filme WHERE nome LIKE '%$seach%'";
        $result = mysqli_query($conn, $sql);
    } else {
        include "conn.php";
        $sql = "SELECT * FROM filme";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Erro na consulta: " . mysqli_error($conn));
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


    <title>Document</title>
</head>

<body>
    <!-- Header -->
    <nav class="navbar">
            <a class="navbar-brand"><img src="css/insulfilm.png" alt="Insulfilm"></a>
            <form class="d-flex" role="search" method="POST">
                <input class="form-control me-2" type="search" placeholder="Search" name="seach" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
    </nav>

    <!-- Itens -->
    <div class=" container">
        <div class="menu">
            <?php
                while ($row = mysqli_fetch_assoc($result)) {

                echo "<div class='menu'> <div class='movie'>";

                    echo "<div class='poster' style='background-image: url({$row['imagem']})' alt='{$row['nome']}'>
                            <div class='teste'>{$row['descricao']}</div>
                    </div>";

                    echo "<div class='description'>
                            <h1>{$row['nome']}</h1>
                            <h2>R$ {$row['valor']}</h2>
                    </div>";

                    echo "<div class='buttons'>
                            <a class='sell' href=\"filme_vender.php?id={$row['codigo']}\">Vender</a>
                            <a class='add' href=\"filme_adicionar.php?id={$row['codigo']}\">Adicionar</a>
                            <a class='edit' href=\"filme_editar.php?id={$row['codigo']}\">Editar</a>
                            <a class='exclude' href=\"filme_excluir.php?id={$row['codigo']}\">Excluir</a>
                    </div>";

                echo "</div> </div>";
                }
            ?>
        </div>
        
        <a href="./filme_registrar.php" class="register">Registrar Filme</a>
    </div>

</body>

</html>
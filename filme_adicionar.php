<?php
    include "conn.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $air_codigo = $_GET['id'];
        $air_quantidadeRequerida = $_POST['quant'];
        $air_sql = "SELECT * FROM filme WHERE codigo = $air_codigo";
        $air_result = mysqli_query($air_conn, $air_sql);
        $air_row = mysqli_fetch_assoc($air_result);
        $air_num = $air_row['quantidadeEstoque']+$air_quantidadeRequerida;
        $air_sql = "UPDATE filme SET quantidadeEstoque = '$air_num' WHERE codigo = $air_codigo";
        $air_result = mysqli_query($air_conn, $air_sql);

        if($air_result){
            header('Location: index.php');
            exit();
        }
    }

    if(isset($_GET['id'])){
        $air_id = $_GET['id'];

        $air_sql = "SELECT * FROM filme WHERE codigo = $air_id";
        $air_result = mysqli_query($air_conn, $air_sql);

        $air_row = mysqli_fetch_assoc($air_result);
    }
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/index.css">
    
    <link rel="stylesheet" href="./css/adicionar.css">

    <title>Adicionar Filme</title>
</head>

<body>
    <!-- Header -->
    <nav class="navbar">
            <a class="navbar-brand" href="index.php"><img src="css/insulfilm.png" alt="Insulfilm"></a>
    </nav>

        <div class="container">
            <?php if($air_row): ?>
                <div class="poster" style="background-image: url('<?php echo $air_row['imagem']; ?>');"></div>
                
                <div class="info">
                    <div class="noneditable">
                        <h1><?php echo $air_row['nome']; ?></h1>
                        <h3><?php echo $air_row['descricao']; ?><h3>
                        <p><strong>Código:</strong> <?php echo $air_row['codigo']; ?></p>
                        <p><strong>Valor:</strong> <?php echo $air_row['valor']; ?></p>
                        <p><strong>Quantidade em Estoque:</strong> <?php echo $air_row['quantidadeEstoque']; ?></p>
                    </div>
                    

                    <form method="POST">
                        <div class="formulario">
                            <label for="codigo" class="form-label">Adicionar</label>
                            <input type="number" class="form-control" name="quant" min="1" maxlength="255" required>
                            <p>unidades</p>
                        </div>
                        <div class="control">
                            <input type="submit" class="button" value="Add"></input>
                            <a class="button" href="index.php">Voltar</a>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
</body>

</html>
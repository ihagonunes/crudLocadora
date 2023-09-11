<?php
    include "conn.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $codigo = $_GET['id'];
        $quantidadeRequerida = $_POST['quant'];
        $sql = "SELECT * FROM filme WHERE codigo = $codigo";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $num = $row['quantidadeEstoque']+$quantidadeRequerida;
        $sql = "UPDATE filme SET quantidadeEstoque = '$num' WHERE codigo = $codigo";
        $result = mysqli_query($conn, $sql);

        if($result){
            header('Location: index.php');
            exit();
        }



    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM filme WHERE codigo = $id";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/index.css">
    
    <link rel="stylesheet" href="./css/adicionar.css">

    <title>Document</title>
</head>

<body>
    <!-- Header -->
    <nav class="navbar">
            <a class="navbar-brand"><img src="css/insulfilm.png" alt="Insulfilm"></a>
    </nav>

        <div class="container">
            <?php if($row): ?>
                <div class="poster" style="background-image: url('<?php echo $row['imagem']; ?>');"></div>
                
                <div class="info">
                    <h1><?php echo $row['nome']; ?></h1>
                    <h3><?php echo $row['descricao']; ?><h3>
                    <p><strong>Código:</strong> <?php echo $row['codigo']; ?></p>
                    <p><strong>Valor:</strong> <?php echo $row['valor']; ?></p>
                    <p><strong>Quantidade em Estoque:</strong> <?php echo $row['quantidadeEstoque']; ?></p>

                    <form method="POST">
                        <div class="form">
                            <label for="codigo" class="form-label">Adicionar</label>
                            <input type="number" class="form-control" name="quant" maxlength="255" required>
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
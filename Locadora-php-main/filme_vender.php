<?php
    include "conn.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $codigo = $_GET['id'];
        $quantidadeRequerida = $_POST['quant'];
        $sql = "SELECT * FROM filme WHERE codigo = $codigo";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['quantidadeEstoque']>=$quantidadeRequerida){
            $num = $row['quantidadeEstoque']-$quantidadeRequerida;
            $sql = "UPDATE filme SET quantidadeEstoque = '$num' WHERE codigo = $codigo";
            $result = mysqli_query($conn, $sql);

            if($result){
                header('Location: index.php');
                exit();
            }
        }else {
            echo "Quantidade Inválida";
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
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/adicionar.css">

    <title>Document</title>
</head>

<body>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Header -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Locadora</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <img src="<?php echo $row['imagem']; ?>" class="img">
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <?php if($row): ?>
                    <h2 class="title-lg">Detalhes do Filme</h2>
                    <p class="lead"><strong>Código:</strong> <?php echo $row['codigo']; ?></p>
                    <p class="lead"><strong>Nome:</strong> <?php echo $row['nome']; ?></p>
                    <p class="lead"><strong>Valor:</strong> <?php echo $row['valor']; ?></p>
                    <p class="lead"><strong>Quantidade em Estoque:</strong> <?php echo $row['quantidadeEstoque']; ?></p>
                    <p class="lead"><strong>Descrição:</strong> <?php echo $row['descricao']; ?></p>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Quantidade</label>
                            <input type="text" class="form-control" name="quant" maxlength="255" required>
                        </div>
                        <input type="submit" class="btn btn-primary btn-lg" value="Vender"></input>
                        <a class="btn btn-secondary btn-lg" href="index.php">Voltar</a>
                    </form>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</body>

</html>
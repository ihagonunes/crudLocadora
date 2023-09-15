<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "conn.php";

        $codigo = $_GET['id'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $descricao = $_POST['descricao'];
        $imagem = $_POST['imagem'];

        $sql = "UPDATE filme SET codigo = '$codigo', nome = '$nome', valor = '$valor',  descricao = '$descricao', imagem = '$imagem' WHERE codigo = $codigo";
        $result = mysqli_query($conn, $sql);

        if($result){
            header('Location: index.php');
            exit();
        }else{
            echo "Erro ao atualizar dados  livro";
            die(mysqli_error($conn));
        }
    }elseif(isset($_GET['id'])){
        include "conn.php";

        $id = $_GET['id'];
        $sql = "SELECT * FROM filme WHERE codigo = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme</title>

    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/editar.css">

</head>

<body>

    <!-- Header -->
    <nav class="navbar">
        <a class="navbar-brand" href="index.php"><img src="css/insulfilm.png" alt="Insulfilm"></a>
    </nav>

    <div class="container">
        <h1>Atualizar Dados do Filme</h1>
        <form action="" method="POST">
            <div class="field">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" class="form-control" name="codigo" maxlength="255" disabled
                    value="<?php echo isset($row['codigo']) ? $row['codigo'] : ''; ?>">
            </div>
            <div class="field">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" maxlength="255" required
                    value="<?php echo isset($row['nome']) ? $row['nome'] : ''; ?>">
           </div>
            <div class="field">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" class="form-control" name="valor" required
                    value="<?php echo isset($row['valor']) ? $row['valor'] : ''; ?>">
            </div>
            <div class="field">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" maxlength="255"
                    required><?php echo isset($row['descricao']) ? $row['descricao'] : ''; ?></textarea>
            </div>
            <div class="field">
                <label for="imagem" class="form-label">URL da Imagem</label>
                <input type="text" class="form-control" name="imagem" maxlength="255" required
                    value="<?php echo isset($row['imagem']) ? $row['imagem'] : ''; ?>">
            </div>

            <input type="submit" value="Salvar Filme" class="button">
        </form>
    </div>
</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "conn.php";

        $air_codigo = $_GET['id'];
        $air_nome = $_POST['nome'];
        $air_valor = $_POST['valor'];
        $air_descricao = $_POST['descricao'];
        $air_imagem = $_POST['imagem'];

        if($air_valor<=0){
            echo '
                <h2
                    style="color: rgb(255,255,255);"
                >Insira um valor válido.</h2>
            ';
            
            include "conn.php";
            $air_id = $_GET['id'];
            $air_sql = "SELECT * FROM filme WHERE codigo = $air_id";
            $air_result = mysqli_query($air_conn, $air_sql);
            $air_row = mysqli_fetch_assoc($air_result);
            
        }
        else{
            $air_sql = "UPDATE filme SET codigo = '$air_codigo', nome = '$air_nome', valor = '$air_valor',  descricao = '$air_descricao', imagem = '$air_imagem' WHERE codigo = $air_codigo";
            $air_result = mysqli_query($air_conn, $air_sql);
            if($air_result){
                header('Location: index.php');
                exit();
            }else{
                echo "Erro ao atualizar dados  livro";
                die(mysqli_error($air_conn));
            }
        }
    }elseif(isset($_GET['id'])){
        include "conn.php";

        $air_id = $_GET['id'];
        $air_sql = "SELECT * FROM filme WHERE codigo = $air_id";
        $air_result = mysqli_query($air_conn, $air_sql);
        $air_row = mysqli_fetch_assoc($air_result);
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
                    value="<?php echo isset($air_row['codigo']) ? $air_row['codigo'] : ''; ?>">
            </div>
            <div class="field">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" maxlength="255" required
                    value="<?php echo isset($air_row['nome']) ? $air_row['nome'] : ''; ?>">
           </div>
            <div class="field">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" class="form-control" name="valor" step="0.01" required
                    value="<?php echo isset($air_row['valor']) ? $air_row['valor'] : ''; ?>">
            </div>
            <div class="field">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" maxlength="255"
                    required><?php echo isset($air_row['descricao']) ? $air_row['descricao'] : ''; ?></textarea>
            </div>
            <div class="field">
                <label for="imagem" class="form-label">URL da Imagem</label>
                <input type="text" class="form-control" name="imagem" maxlength="255" required
                    value="<?php echo isset($air_row['imagem']) ? $air_row['imagem'] : ''; ?>">
            </div>

            <input type="submit" value="Salvar Filme" class="button">
        </form>
    </div>
</body>
</html>
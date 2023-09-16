<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "conn.php";

        $air_nome = $_POST['nome'];
        $air_valor = $_POST['valor'];
        $air_descricao = $_POST['descricao'];
        $air_imagem = $_POST['imagem'];
        $air_estoque = $_POST['estoque'];

        if($air_estoque<0 || $air_valor<=0){
            echo '
                <h2
                    style="color: rgb(255,255,255);"
                >Insira números válidos</h2>
            ';
        }
        else{
            $air_sql = "INSERT INTO filme (quantidadeEstoque, nome, valor, descricao, imagem)
            VALUES ('$air_estoque', '$air_nome', '$air_valor', '$air_descricao', '$air_imagem')";
            $air_result = mysqli_query($air_conn, $air_sql);

            if($air_result){
                header('Location: index.php');
                exit();
            }else{
                echo "Erro ao atualizar dados  livro";
                die(mysqli_error($air_conn));
            }   
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/editar.css">

    <title>Registrar Filme</title>
</head>

<body>

    <!-- Header -->
    <nav class="navbar">
            <a class="navbar-brand" href="index.php"><img src="css/insulfilm.png" alt="Insulfilm"></a>
    </nav>


    <div class="container">
        <h1>Registrar Filme</h1>
        <form action="" method="POST">
            <div class="field">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" maxlength="255" required
                >
           </div>

            <div class="field">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" maxlength="255"
                    required></textarea>
            </div>
           
            <div class="field">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" class="form-control" name="valor" step="0.01" required>
            </div>
           
            <div class="field">
                <label for="quantidade" class="form-label">Quantidade em estoque</label>
                <input type="number" class="form-control" name="estoque" maxlength="255" required></input>
            </div>
           
            <div class="field">
                <label for="imagem" class="form-label">URL da Imagem</label>
                <input type="text" class="form-control" name="imagem" maxlength="255" required>
            </div>
            <div class="control">
                <input type="submit" value="Salvar Filme" class="button">
                <a class="button" href="index.php">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Alunos Cadastrados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <h1>Alunos Cadastrados:</h1>
    <br>

    <?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }

    $dados = 'dadoscadastrados.txt';
    if (file_exists($dados)){
        $arquivo = fopen($dados, 'r');
        while (!feof($arquivo)){
            $linha = fgets($arquivo);
            echo $linha."<br>";
        }
        fclose($arquivo);
    }else{
        echo "O arquivo não existe";
    }
    ?>

    <a href="welcome.php" class="btn btn-primary">Voltar</a>

</body>
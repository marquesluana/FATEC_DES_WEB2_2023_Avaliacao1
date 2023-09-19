<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$nome=$_POST["nome"];
$ra=$_POST["ra"];
$placa=$_POST["placa"];
$dados=fopen("dadoscadastrados.txt", "a");
fwrite($dados, $nome."|".$ra."|".$placa."\n");
fclose($dados);
echo "Cadastro inserido com sucesso!";
}

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro Alunos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Cadastrar Aluno</h2>
        <p>Favor inserir nome completo, registro acadêmico (R.A.) e a placa do veículo.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nome Completo</label>
                <input type="text" name="nome" class="form-control">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>R.A.</label>
                <input type="text" name="ra" class="form-control">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Placa do carro ou moto</label>
                <input type="text" name="placa" class="form-control">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </div>
        </form>
        <a href="welcome.php" class="btn btn-primary">Voltar</a>
    </div>
</body>
</html>
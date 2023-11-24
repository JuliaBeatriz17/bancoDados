<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filme inserir</title>
</head>
<body>
<h3>INSERIR FILME</h3>
<hr><a href="index.php">HOME</a><hr>
<?php
require_once('conexao.php');
$con = null;
try{
    $con = getConexao();
}catch(PDOException $e){
    die("Erro ao conectar com o bd. {$e->getMessage()}");
}
$filmeParaInserir = $_POST;
try{
    $sql = "INSERT INTO filmes(titulo,nota) VALUES(?,?)";
    $ps = $con->prepare($sql);
    $ps->bindParam(1,$filmeParaInserir['titulo']);
    $ps->bindParam(2,$filmeParaInserir['nota']);
    $ps->execute();
    echo "Filme inserido com sucesso! O id gerado foi {$con->lastInsertId()}<br>";
}catch(PDOException $e){
    die("Erro ao inserir filme. {$e->getMessage()}");
} ?>
</body>
</html>

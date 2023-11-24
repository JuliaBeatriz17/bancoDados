<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filme excluir</title>
</head>
<body>
<h3>EXCLUIR FILME</h3>
<hr><a href="index.php">HOME</a><hr>
<?php
require_once('conexao.php');
$con = null;
try{
    $con = getConexao();
}catch(PDOException $e){
    die("Erro ao conectar com o bd. {$e->getMessage()}");
}
$idFilmeParaExcluir = $_GET['id'];
try{
    $sql = "DELETE FROM filmes WHERE id=?";
    $ps = $con->prepare($sql);
    $ps->bindParam(1,$idFilmeParaExcluir);
    $ps->execute();
    echo "Filme excluido com sucesso! Linhas afetadas: {$ps->rowCount()}<br>";
}catch(PDOException $e){
    die("Erro ao excluir filme. {$e->getMessage()}");
}
?>
</body>
</html>
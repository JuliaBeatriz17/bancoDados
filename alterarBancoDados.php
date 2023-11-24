<?php declare(strict_types=1);?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filme alterar</title>
</head>
<body>
<h3>ALTERAR FILME</h3>
<hr><a href="index.php">HOME</a><hr>
<?php
require_once('conexao.php');
$con = null;
try{
    $con = getConexao();
}catch(PDOException $e){
    die("Erro ao conectar com o bd. {$e->getMessage()}");
}
$filmeParaAlterar = $_POST;
$sql = "UPDATE filmes SET titulo=:TITU, nota=:NOTA WHERE id =:ID";
try{ 
    $ps = $con->prepare($sql);
    $ps->bindParam('TITU',$filmeParaAlterar['titulo']);
    $ps->bindParam('NOTA',$filmeParaAlterar['nota']);
    $ps->bindParam('ID',$filmeParaAlterar['id']);
    $ps->execute();
    echo "Filme alterado com sucesso! Linhas afetadas: {$ps->rowCount()}<br>";
}catch(PDOException $e){
    die("Erro ao alterar filme. {$e->getMessage()}");
}
?>
</body>
</html>
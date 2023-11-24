<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obter filme para alterar</title>
</head>
<body>
<h3>ALTERAR FILME</h3>
<hr><a href="index.php">HOME</a><hr>
<?php
require_once('conexao.php');
$con = null;
$filmeObtido = null;
try{
    $con = getConexao();
}catch(PDOException $e){
    die("Erro ao conectar com o bd. {$e->getMessage()}");
}
$idDoFilmeObtido = $_GET['id']; 
$sql = <<<SQL
    SELECT * FROM filmes WHERE id=?
SQL;     
try{     
    $ps = $con->prepare($sql);
    $ps->bindParam(1,$idDoFilmeObtido);
    $ps->execute();  $filmes = $ps->fetchAll(PDO::FETCH_ASSOC);
    foreach($filmes as $filme)
        $filmeObtido = ['id'=>$filme['id'], 'titulo'=>$filme['titulo'], 'nota'=>$filme['nota'] ];
}catch(PDOException $e){
    die("Erro ao obter filme. {$e->getMessage()}");
} ?>
<main>
    <form action="alterarBancoDados.php" method="post">
        <label for="id">Id: </label>
        <input type="text" name="id" id="id" readonly value='<?php echo $filmeObtido['id']; ?>' ><br><br>
        <label for="titulo">Título: </label>
        <input type="text" name="titulo" id="titulo" required value='<?php echo $filmeObtido['titulo']; ?>' ><br><br>
        <label for="nota">Nota: </label>
        <input type="number" name="nota" id="nota" min="0" max="10" step="0.1" 
        required value='<?php echo $filmeObtido['nota']; ?>' ><br><br>
        <input type="submit" value="Alterar"> <input type="reset" value="Limpar">
    </form>
</main>  
</body>
</html>

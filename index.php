<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
</head>
<body>
<?php
require_once('conexao.php');
$con = null;
try{
    $con = getConexao();
}catch(PDOException $e){
    die("Erro ao conectar com o bd. {$e->getMessage()}");
}  
$sql = <<<SQL
select * FROM filmes ORDER BY titulo
SQL;
$filmes =null;
try{
    $ps = $con->prepare($sql);
    $ps->execute();
    $filmes = $ps->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    die("Erro ao consultar filmes. {$e->getMessage()}");
} ?>
<h3>Listagem de filmes</h3>
<hr><a href="inserirFilme.php">INSERIR NOVO FILME</a><hr>
<table border="1">
    <thead>
        <th>ID</th><th>Título</th><th>Avaliação</th><th>AÇÕES</th>
    </thead>
    <tbody>
    <?php
    foreach($filmes as $filme){
    echo "<tr>";
    echo "<td>{$filme['id']}</td><td>{$filme['titulo']}</td><td>{$filme['nota']}</td>";
    echo "<td><a href=excluirBancoDados.php?id={$filme['id']} >[EXCLUIR]</a>
    <a href=obterBancoDados.php?id={$filme['id']} >[ALTERAR]</td>";
    echo "</tr>";
    }?>   
    </tbody>
</table>
</body>
</html>





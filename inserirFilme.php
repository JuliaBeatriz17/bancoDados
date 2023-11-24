<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes - Inserir</title>
</head>
<body>
<h3>Inserir novo filme</h3> 
<hr>
<a href="index.php">HOME</a>
<hr>
<main>
    <form action="inserirBancoDados.php" method="post">
        <label for="titulo">Título: </label>
        <input type="text" name="titulo" id="titulo" required><br><br>
        <label for="nota">Nota: </label>
        <input type="number" name="nota" id="nota" min="0" max="10" step="0.1" required><br><br>
        <input type="submit" value="Enviar"> <input type="reset" value="Limpar">
    </form>
</main>  
</body>
</html>
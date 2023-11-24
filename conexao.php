<?php
function getConexao():PDO{
    $dsn='mysql:dbname=cinema;host=localhost;charset=utf8';
    $pdo = new PDO($dsn,'root','',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    return $pdo;
}

?>
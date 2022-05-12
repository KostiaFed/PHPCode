<?php
/* Example code to use:

$pdo = include 'connector.php';

$result = $pdo->query("select ID_Professor, Name_Professor from Professors");

 */
$config = include 'config.php';

#$dsn = "mysql:host=localhost;dbname=".$config['db'];

$dsn = "sqlite:".$config['db'];

/*$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);*/

try {
    #$pdo = new PDO($dsn, $config['user'], $config['pass'], $opt);
    $pdo = new PDO($dsn);
} catch (Exception $e) {
    echo 'Помилка підключення до бази даних: ', $e->getMessage(), "\n";
}

return $pdo;
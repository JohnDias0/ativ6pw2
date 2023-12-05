<?php

include_once __DIR__ . "/../vendor/autoload.php";
use App\Persistence\ConnectionFactory;
use App\SystemServices\MonologFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$logger = MonologFactory::getInstance();
$logger->info("Info");
$logger->debug("main.php is running");
$logger->error("ERROR");

$connectionFactory = new ConnectionFactory();

$pdo = $connectionFactory->createConnection();

try {
    $query = "SELECT id, nome FROM usuario";

    $statement = $pdo->prepare($query);

    $statement->execute();


    $result = $statement->fetchAll(PDO::FETCH_ASSOC);


    foreach ($result as $row) {
        echo "ID: " . $row['id'] . ", Nome: " . $row['nome'] . "<br>";
    }
} catch (PDOException $e) {

    die("ERROR: " . $e->getMessage());
}
 
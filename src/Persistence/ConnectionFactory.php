<?php

namespace App\Persistence;

use App\SystemServices\MonologFactory;

$hostname = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'etec';

class ConnectionFactory{
    private static $pdo;


    static function getConnectionInstance() {

        if (self::$pdo === null) {
             $hostname = '127.0.0.1';
 $username = 'root';
 $password = '';
 $database = 'etec';
try {
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    MonologFactory::getInstance()->info("Conexão bem-sucedida");

    $conn = null;
} catch (PDOException $e) {
    MonologFactory::getInstance()->info("Erro de conexão: " . $e->getMessage());
}}
return self::$pdo;

}
}

?>
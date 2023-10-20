<?php
$host = "localhost";
$db   = "cours";
$user = "RatchetDrake";
$pass = "Azerty";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    $fruit = $_POST['fruit'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare("INSERT INTO panier (fruit, quantity) VALUES (?, ?)");
    $stmt->execute([$fruit, $quantity]);

    echo "Panier mis à jour avec succès pour le fruit : " . $fruit;
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>

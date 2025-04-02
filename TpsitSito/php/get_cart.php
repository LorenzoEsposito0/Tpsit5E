<?php
session_start();
require_once 'DbConnection.php';
$config = require_once 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Utente non autenticato']);
    exit;
}

$userId = $_SESSION['user_id'];

try {
    $pdo = DbConnection::GETdb($config);

    $stmt = $pdo->prepare("
        SELECT c.id, p.id as product_id, p.name, p.price, c.quantity 
        FROM cart c
        JOIN products p ON c.product_id = p.id
        WHERE c.user_id = ?
    ");
    $stmt->execute([$userId]);

    $items = $stmt->fetchAll(PDO::FETCH_OBJ);

    echo json_encode(['success' => true, 'items' => $items]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Errore del database: ' . $e->getMessage()]);
}
?>
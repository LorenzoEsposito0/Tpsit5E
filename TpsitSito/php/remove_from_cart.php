<?php
session_start();
require_once 'DbConnection.php';
$config = require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Utente non autenticato']);
    exit;
}

if (!isset($_POST['product_id'])) {
    echo json_encode(['success' => false, 'message' => 'Prodotto non specificato']);
    exit;
}

$userId = $_SESSION['user_id'];
$productId = $_POST['product_id'];

try {
    $pdo = DbConnection::GETdb($config);

    // Rimuovi il prodotto dal carrello
    $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->execute([$userId, $productId]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Errore del database: ' . $e->getMessage()]);
}
?>
<?php
session_start();
require_once 'DbConnection.php';
$config = require_once 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Utente non autenticato']);
    exit;
}

if (!isset($_POST['product_id'])) {
    echo json_encode(['success' => false, 'message' => 'Prodotto non specificato']);
    exit;
}

$userId = $_SESSION['user_id'];
$productId = intval($_POST['product_id']);

try {
    $pdo = DbConnection::GETdb($config);

    // Verifica se il prodotto esiste
    $stmt = $pdo->prepare("SELECT id FROM products WHERE id = ?");
    $stmt->execute([$productId]);

    if (!$stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Prodotto non trovato']);
        exit;
    }

    // Verifica se è già nel carrello
    $stmt = $pdo->prepare("SELECT id, quantity FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->execute([$userId, $productId]);
    $existingItem = $stmt->fetch();

    if ($existingItem) {
        // Aggiorna quantità
        $stmt = $pdo->prepare("UPDATE cart SET quantity = quantity + 1 WHERE id = ?");
        $stmt->execute([$existingItem->id]);
    } else {
        // Aggiungi nuovo
        $stmt = $pdo->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)");
        $stmt->execute([$userId, $productId]);
    }

    echo json_encode(['success' => true, 'message' => 'Prodotto aggiunto al carrello']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Errore del database: ' . $e->getMessage()]);
}
?>
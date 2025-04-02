<?php
session_start();
require_once 'DbConnection.php';
$config = require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Utente non autenticato']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$userId = $_SESSION['user_id'];

try {
    $pdo = DbConnection::GETdb($config);
    $pdo->beginTransaction();

    // 1. Verifica disponibilità prodotti
    foreach ($data['products'] as $product) {
        $stmt = $pdo->prepare("SELECT stock FROM products WHERE id = ?");
        $stmt->execute([$product['id']]);
        $productData = $stmt->fetch();

        if (!$productData || $productData->stock < 1) {
            throw new Exception("Prodotto {$product['name']} non disponibile");
        }
    }

    // 2. Crea ordine (dovresti avere una tabella orders)
    $total = array_reduce($data['products'], function($sum, $product) {
            return $sum + $product['price'];
        }, 0) - ($data['discount'] ?? 0);

    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_amount, created_at) VALUES (?, ?, NOW())");
    $stmt->execute([$userId, $total]);
    $orderId = $pdo->lastInsertId();

    // 3. Aggiungi prodotti all'ordine (dovresti avere order_items)
    foreach ($data['products'] as $product) {
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, 1, ?)");
        $stmt->execute([$orderId, $product['id'], $product['price']]);

        // Aggiorna stock
        $stmt = $pdo->prepare("UPDATE products SET stock = stock - 1 WHERE id = ?");
        $stmt->execute([$product['id']]);
    }

    // 4. Svuota carrello
    $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = ?");
    $stmt->execute([$userId]);

    $pdo->commit();
    echo json_encode(['success' => true, 'message' => 'Ordine completato']);
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
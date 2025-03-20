<?php
session_start();
require 'DbConnection.php';
$config = require 'config.php';
$db = Dbconnection::GETdb($config);

// Verifica se l'utente è loggato
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Utente non loggato']);
    exit();
}

// Verifica se il carrello è vuoto
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo json_encode(['success' => false, 'message' => 'Carrello vuoto']);
    exit();
}

// Recupera l'email dell'utente dalla sessione
$email = $_SESSION['email'];

// Array per memorizzare i risultati degli inserimenti
$results = [];

// Itera attraverso gli articoli nel carrello e inseriscili nel database
foreach ($_SESSION['cart'] as $item) {
    $product_name = $item['name'];
    $quantity = $item['quantity'];
    $total_price = $item['price'] * $item['quantity'];

    // Prepara la query per inserire l'ordine nel database
    $stmt = $db->prepare("INSERT INTO orders (email, product_name, quantity, total_price) VALUES (:email, :product_name, :quantity, :total_price)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':total_price', $total_price);

    // Esegui la query
    if ($stmt->execute()) {
        $results[] = ['success' => true, 'message' => 'Ordine inserito con successo'];
    } else {
        $results[] = ['success' => false, 'message' => 'Errore durante l\'inserimento dell\'ordine'];
    }
}

// Svuota il carrello dopo l'ordine
unset($_SESSION['cart']);

// Restituisci una risposta JSON
echo json_encode(['success' => true, 'message' => 'Checkout completato con successo', 'results' => $results]);
exit();
?>
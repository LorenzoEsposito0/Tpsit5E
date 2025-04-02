<?php
session_start(); // Avvia la sessione
require 'DbConnection.php';
$config = require 'config.php';
$db = Dbconnection::GETdb($config);

// Controlla se è stato inviato il form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['registerName']);
    $email = trim($_POST['registerEmail']);
    $password = trim($_POST['registerPassword']);

    if (empty($fullname) || empty($email) || empty($password)) {
        echo "Per favore, riempi tutti i campi!";
        exit;
    }

    // Cripta la password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Controlla se l'email esiste già
        $checkUser = $db->prepare("SELECT * FROM users WHERE email = :email");
        $checkUser->bindParam(':email', $email);
        $checkUser->execute();

        if ($checkUser->rowCount() > 0) {
            echo "L'email è già registrata!";
            exit;
        }

        // Inserisce il nuovo utente
        $stmt = $db->prepare("INSERT INTO users (fullname, email, password) VALUES (:fullname, :email, :password)");
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            // Imposta le variabili di sessione
            $_SESSION['user_id'] = $db->lastInsertId();
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;

            // Debug temporaneo per controllare la sessione
            // print_r($_SESSION);
            // exit();

            // Reindirizza alla homepage
            header("Location: ../index.php");
            exit();
        } else {
            echo "Errore durante la registrazione!";
        }
    } catch (Exception $e) {
        echo "Errore: " . $e->getMessage();
    }
} else {
    echo "Richiesta non valida.";
}
?>

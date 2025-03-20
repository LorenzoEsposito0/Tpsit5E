<?php
session_start();
require 'DbConnection.php';
$config = require 'config.php';
$db = Dbconnection::GETdb($config);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['registerName'];
    $email = $_POST['registerEmail'];
    $password = password_hash($_POST['registerPassword'], PASSWORD_BCRYPT);

    $stmt = $db->prepare("INSERT INTO users (fullname, email, password) VALUES (:fullname, :email, :password)");
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        // Imposta le variabili di sessione
        $_SESSION['user_id'] = $db->lastInsertId();
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;

        // Reindirizza l'utente alla homepage
        header("Location: ../index.php");
        exit();
    } else {
        echo "Errore durante la registrazione!";
    }
}
?>
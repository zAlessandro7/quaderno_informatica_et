<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Riservata</title>
</head>
<body>
    <h1>Benvenuto nella zona riservata</h1>
    <p>Sei stato autenticato correttamente!</p>
    <p><a href="login.php">Esci</a></p>
</body>
</html>
<?php
// zona_riservata.php

// Definiamo le credenziali corrette (per esempio hardcoded, in un'applicazione reale dovrebbero essere recuperate da un database)
$correct_username = 'admin';
$correct_password = 'password123';

// Verifica se l'utente ha effettuato il login correttamente
if (!isset($_POST['username']) || !isset($_POST['password']) ||
    $_POST['username'] !== $correct_username || $_POST['password'] !== $correct_password) {
    // Se non è stato effettuato il login, reindirizza alla pagina di login
    header('Location: login.php');
    exit();
}

?>



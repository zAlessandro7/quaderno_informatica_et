<!-- ES02A/index.php -->
<?php
session_start(); // Avvia la sessione

// Definiamo le credenziali corrette per il login
$username = 'admin';
$password = '12345';

// Variabile per gestire il messaggio di errore o successo
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica delle credenziali inserite
    $input_username = $_POST['username'] ?? '';
    $input_password = $_POST['password'] ?? '';

    if ($input_username == $username && $input_password == $password) {
        // Le credenziali sono corrette, settiamo la sessione
        $_SESSION['logged_in'] = true;  // Impostiamo la sessione
        $_SESSION['username'] = $username; // Memorizziamo il nome utente
        header('Location: welcome.php');  // Reindirizza alla pagina protetta
        exit();
    } else {
        $message = 'Credenziali errate, riprova.';
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <!-- Mostriamo il messaggio di errore se le credenziali sono errate -->
    <p style="color: red;"><?php echo $message; ?></p>
    
    <!-- Form di login -->
    <form action="index.php" method="POST">
        <label for="username">Nome Utente:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Accedi">
    </form>
</body>
</html>

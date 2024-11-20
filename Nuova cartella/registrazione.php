<form action="registrazione.php" method="POST">
    <label for="username">Nome Utente:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="confirm_password">Conferma Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <button type="submit" name="registrati">Registrati</button>
</form>



<?php
// Connessione al database
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "nome_del_tuo_database";  // Sostituisci con il nome del tuo database

// Crea connessione
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if (isset($_POST['registrati'])) {
    // Recupera i dati del modulo
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Verifica che le password corrispondano
    if ($password !== $confirm_password) {
        echo "Le password non corrispondono!";
    } else {
        // Sicurezza: fare il "hash" della password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepara la query per inserire i dati nel database
        $sql = "INSERT INTO utenti (username, password) VALUES (?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind dei parametri
            $stmt->bind_param("ss", $username, $hashed_password);

            // Esegui la query
            if ($stmt->execute()) {
                echo "Registrazione riuscita!";
            } else {
                echo "Errore durante la registrazione: " . $stmt->error;
            }

            // Chiudi lo statement
            $stmt->close();
        }
    }
}

// Chiudi la connessione
$conn->close();
?>

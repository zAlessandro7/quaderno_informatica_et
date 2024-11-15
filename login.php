
<?php
// Definisci le credenziali di accesso predefinite
$valid_username = 'admin';
$valid_password = 'password123';

// Recupera i dati inviati dal modulo
$username = isset($_POST['admin']) ? $_POST['admin'] : '';
$password = isset($_POST['password123']) ? $_POST['password123'] : '';
echo "<p>$valid_username</p>";
echo "<p>$valid_password</p>";
// Verifica le credenziali
if ($username == $valid_username && $password == $valid_password) {
    // Se le credenziali sono corrette, reindirizza alla pagina riservata
    header("Location: zona_riservata.php");
  
} else {
    // Se le credenziali sono errate, mostra un messaggio di errore
    echo "<p>Credenziali errate. Riprova.</p>";
    
}
echo "<p><a href='index.html'>Torna al menù principale</a></p>";
?>

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
        <a href="registrazione.php"><button type="button">Registrati!</button></a>
    </form>
</body>
</html>


<?php
// Verifica se il form è stato inviato e se N è valido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera il numero N scelto
    $N = isset($_POST['numero']) ? (int)$_POST['numero'] : 0;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabella dei Quadrati e Cubi</title>
 
<body>

    <h1>Genera la Tabella dei Quadrati e Cubi</h1>

    <!-- Form per selezionare il numero N -->
    <?php if (!isset($N)): ?>
        <form method="POST" action="">
            <label for="numero">Seleziona un numero N (tra 1 e 10):</label>
            <select name="numero" id="numero" required>
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>
            <input type="submit" value="Crea tabella">
        </form>
    <?php endif; ?>

    <?php
    // Se il form è stato inviato, generiamo la tabella
    if (isset($N) && $N >= 1 && $N <= 10):
    ?>
        <table>
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Quadrato</th>
                    <th>Cubo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Genera la tabella con i quadrati e cubi dei numeri da 1 a N
                for ($i = 1; $i <= $N; $i++):
                    $quadrato = $i * $i;
                    $cubo = $i * $i * $i;
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $quadrato ?></td>
                        <td><?= $cubo ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>

<?php include 'verifica.php';
include 'partials/header.php';

$mensagem_sucesso = false;
$mensagem_erro = false;

if (isset($_POST['register'])) {
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];

    $check_sql = "SELECT username FROM users WHERE username = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $new_username);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        $mensagem_erro = "Lo username '$new_username' è già registrato!";
    } else {

        $safe_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $_POST['username'], $safe_password);

        if ($stmt->execute()) {
            echo "Utente registrato con successo!";
            $stmt->close();
            $mensagem_sucesso = true;
        } else {
            $mensagem_erro = true;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione- L'Antico Forno</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h2>Registrare un nuovo utente</h2>
    <?php if ($mensagem_sucesso): ?>
        <div class="alert-success">
            ✅ Utente <strong><?php echo htmlspecialchars($new_username); ?></strong> registrato con successo!
        </div>
    <?php endif; ?>
    <?php if ($mensagem_erro): ?>
        <div class="alert-failure">
            ❌ Errore: Utente <strong><?php echo htmlspecialchars($new_username); ?></strong> non registrato! <?php echo $conn->error; ?>
        </div>
    <?php endif; ?>

    <form action="account.php" method="post">

        <label for="username">Nome dell'utente:</label><br>
        <input type="text" id="username" name="username" placeholder="scegli un nome" required>
        <br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" placeholder="crea una password forte" required>
        <br><br>

        <button type="submit" name="register" class="btn-register">Completa registrazione</button>
    </form>

    <br>
    <a href="login.php" class="btn-torna-login">Hai già un account? Torna al login</a>
</body>

</html>
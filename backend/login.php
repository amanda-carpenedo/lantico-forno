<?php session_start();
include 'connector.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();



    if ($row = $result->fetch_assoc()) {

        if (password_verify($password, $row['password'])) {

            $_SESSION['admin_logado'] = $row['username'];

            header("Location: index.php");
            exit();
        } else {
            echo "Usuário encontrado, mas a SENHA está errada!";
        }
    } else {
        echo "USUÁRIO não encontrado no banco de dados!";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Antico Forno - Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <section class="login-background">
        <form action="login.php" method="post">
            <img src="./img/pizza2.png" alt="Logo L'Antico Forno" class="logo">
            <input type="text" id="username" name="username" placeholder="Username">
            <input type="password" id="password" name="password" placeholder="Password">
            <div class="container-button">
                <button type="submit" class="btn-login">Login</button>
            </div>
        </form>
    </section>
</body>

</html>
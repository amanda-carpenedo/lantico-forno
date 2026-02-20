<?php
include('../connector.php');
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Backend Pizzeria</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>

<body>
    <h1>Gestione Pizze</h1>
    <nav class="container-btn">
        <a class="btn-elenco" href="index.php">Elenco</a>
        <a class="btn-aggiungi" href="index.php?nuova=1">Aggiungi Pizza</a>
        <a href="account.php" class="btn-crea-account">Creare un account</a>
        <a class="btn-logout" href="logout.php"><img class="logo-logout" src="img/logout-branco.png">Logout</a>

    </nav>
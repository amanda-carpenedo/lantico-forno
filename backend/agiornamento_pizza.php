<?php include 'partials/header.php';
include 'verifica.php'; ?>
<?php
$query = "UPDATE pizza SET nome ='" . $_POST['nome'] . "',ingredienti = '" . $_POST['ingredienti'] . "',prezzo = '" . $_POST['prezzo'] . "' WHERE id = " . $_POST['id'];
if ($result = mysqli_query($conn, $query)) {
    echo "Pizza aggiornata com successo!";
} else {
    echo "Errore durante l'aggiornamento: " . mysqli_error($conn);
}

?>


<?php include 'partials/footer.php'; ?>
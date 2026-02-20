<?php include 'partials/header.php';
include 'verifica.php'; ?>

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['aggiorna'])) {

    $query_agiornamento = "UPDATE pizza SET nome ='" . $_POST['nome'] . "',ingredienti = '" . $_POST['ingredienti'] . "',prezzo = '" . $_POST['prezzo'] . "' WHERE id = " . $_POST['id'];
    if ($result_agiornamento = mysqli_query($conn, $query_agiornamento)) {
        echo "Pizza aggiornata com successo!";
    } else {
        echo "Errore durante l'aggiornamento: " . mysqli_error($conn);
    }
}

$query = "SELECT * FROM pizza WHERE id = " . $_GET['id'];
$result = mysqli_query($conn, $query);
$pizza = mysqli_fetch_assoc($result);
?>




<h2>Modifica Pizza</h2>
<form method="POST" action="index.php">
    <input type="hidden" name="id" value="<?php echo $pizza['id']; ?>">
    <input type="text" name="nome" value="<?php echo $pizza['nome']; ?>"><br><br>
    <textarea name="ingredienti"><?php echo $pizza['ingredienti']; ?></textarea><br><br>
    <input type="number" step="0.01" name="prezzo" value="<?php echo $pizza['prezzo']; ?>"><br><br>
    <button type="submit" name="aggiorna">Aggiorna</button>
</form>


<?php include 'partials/footer.php'; ?>
<?php include 'verifica.php';
include 'partials/header.php';

?>
<?php
// AGGIORNA FOTO
if (isset($_POST['aggiorna'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $ingredienti = $_POST['ingredienti'];
    $prezzo = $_POST['prezzo'];


    if ($_FILES['foto_pizza']['name'] != "") {
        $nome_foto = $_FILES['foto_pizza']['name'];
        $caminho_tmp = $_FILES['foto_pizza']['tmp_name'];
        $pasta_destino = "img-pizza/" . $nome_foto;

        move_uploaded_file($caminho_tmp, $pasta_destino);

        $sql = "UPDATE pizza SET nome=?, ingredienti=?, prezzo=?, img=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdsi", $nome, $ingredienti, $prezzo, $nome_foto, $id);
    } else {
        
        $sql = "UPDATE pizza SET nome=?, ingredienti=?, prezzo=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdi", $nome, $ingredienti, $prezzo, $id);
    }

    if ($stmt->execute()) {
        header("Location: index.php?status=aggiornato");
        exit();
    }
}

//AGGIORNA SENZA FOTO

if (isset($_POST['aggiorna'])) {
    $query = "UPDATE pizza SET nome ='" . $_POST['nome'] . "',ingredienti = '" . $_POST['ingredienti'] . "',prezzo = '" . $_POST['prezzo'] . "' WHERE id = " . $_POST['id'];
    if ($result = mysqli_query($conn, $query)) {
        echo "Pizza aggiornata com successo!";
    } else {
        echo "Errore durante l'aggiornamento: " . mysqli_error($conn);
    }
}
?>

<!-- AGGIUNGI -->
<?php
if (isset($_POST['aggiungi'])) {

    $nome = $_POST['nome'];
    $ingredienti = $_POST['ingredienti'];
    $prezzo = $_POST['prezzo'];

    $nome_foto = $_FILES['foto_pizza']['name'];
    $caminho_tmp = $_FILES['foto_pizza']['tmp_name'];
    $destino = "img-pizza/" . $nome_foto;


    if (move_uploaded_file($caminho_tmp, $destino)) {


        $stmt = $conn->prepare("INSERT INTO pizza (nome, ingredienti, prezzo, img) VALUES (?, ?, ?, ?)");


        $stmt->bind_param("ssds", $nome, $ingredienti, $prezzo, $nome_foto);

        if ($stmt->execute()) {
            $stmt->close();
            header("Location: index.php?sucesso=1");
            exit();
        } else {
            echo "Erro ao salvar no banco: " . $conn->error;
        }
    } else {
        echo "Erro: Não foi possível carregar a imagem para a pasta img-pizza.";
    }
}
?>


<!-- AGGIUNGI -->
<?php
if (isset($_GET['nuova']) && $_GET['nuova'] == 1) {
?>
    <hr>
    <h2>Nuova Pizza - Antico Forno</h2>
    <form method="POST" action="index.php" enctype="multipart/form-data">
        <input type="text" name="nome" placeholder="Nome della Pizza" required><br><br>
        <textarea name="ingredienti" placeholder="Ingredienti" required></textarea><br><br>
        <input type="number" step="0.01" name="prezzo" placeholder="Prezzo" required><br><br>
        <label>Foto della Pizza:</label><br>
        <input type="file" name="foto_pizza" accept="image/*"><br><br>
        <button type="submit" name="aggiungi" class="btn-nuova-pizza">Salva Pizza</button>
        <a href="index.php" class="btn-anulla">Annulla</a>
    </form>
    <hr>
<?php
}
?>



<h2>Elenco pizze</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>Nome</th>
        <th>Ingredienti</th>
        <th>Prezzo (€)</th>
        <th>Immagine</th>
        <th>Azioni</th>
    </tr>

    <?php
    $qmodifica = "SELECT * FROM  pizza";
    $rmodifica = mysqli_query($conn, $qmodifica);

    while ($pizza = mysqli_fetch_assoc($rmodifica)) {

    ?>
        <tr>
            <td><?php echo $pizza['nome']; ?></td>
            <td><?php echo $pizza['ingredienti']; ?></td>
            <td><?php echo $pizza['prezzo']; ?></td>
            <td><img src="img-pizza/<?php echo $pizza['img']; ?>" width="50"></td>
            <td class="btn-modifica-cancella">
                <a class="btn-modifica" href="index.php?modifica=1&id=<?php echo $pizza['id']; ?>">Modifica</a>
                <a class="btn-elimina" href="index.php?annulla=1&id=<?php echo $pizza['id']; ?>">Cancella</a>
                

            </td>
        </tr>

    <?php
    }
    ?>

</table>


<?php
if (isset($_GET['modifica']) && $_GET['modifica'] == 1) {
    $id_edicao = $_GET['id'];
    $res = mysqli_query($conn, "SELECT * FROM pizza WHERE id = $id_edicao");
    $pizza_edit = mysqli_fetch_assoc($res);
?>
    <hr>
    <h2>Modifica Pizza</h2>
    <form method="POST" action="index.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $pizza_edit['id']; ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $pizza_edit['nome']; ?>"><br><br>

        <label>Ingredienti:</label><br>
        <textarea name="ingredienti"><?php echo $pizza_edit['ingredienti']; ?></textarea><br><br>

        <label>Prezzo (€):</label><br>
        <input type="number" step="0.01" name="prezzo" value="<?php echo $pizza_edit['prezzo']; ?>"><br><br>

        <p>Foto attuale: <b><?php echo $pizza_edit['img']; ?></b></p>
        <label>Sostituisci foto (lascia vuoto per non cambiare):</label><br>
        <input type="file" name="foto_pizza" accept="image/*"><br><br> <button type="submit" name="aggiorna" class="btn-aggiorna">Salva Modifiche</button>
        <a href="index.php" class="btn-anulla">Annulla</a>
    </form>
    <hr>
<?php
}
?>


<!-- ANNULLA -->
<?php
if (isset($_GET['annulla']) && $_GET['annulla'] == 1) {
    $query = "DELETE FROM pizza WHERE id = " . $_GET['id'];
    $result = mysqli_query($conn, $query);
    if ($result) {

        echo "Pizza cancellata con successo!";
    } else {
        echo "Errore durante l'eliminazione: " . mysqli_error($conn);
    }
}
?>

<?php include 'partials/footer.php'; ?>
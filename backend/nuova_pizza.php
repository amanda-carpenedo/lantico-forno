<?php include 'partials/header.php';
include 'verifica.php'; ?>





<h2>Nuova Pizza</h2>
<form method="POST" action="index.php">
    <input type="text" placeholder="Nome" name="nome"><br><br>
    <textarea placeholder="Ingredienti" name="ingredienti"></textarea><br><br>
    <input type="number" step="0.01" placeholder="Prezzo" name="prezzo"><br><br>
    <button type="submit" name="aggiungi">Salva</button>
</form>
<?php include 'partials/footer.php'; ?>
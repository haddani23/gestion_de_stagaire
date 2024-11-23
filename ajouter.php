<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $filiere = $_POST['filiere'];
    $annee = $_POST['annee'];

    $conn = new mysqli('localhost', 'root', '', 'gestion_stagiaires');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO stagiaires (nom, prenom, filiere, annee) VALUES ('$nom', '$prenom', '$filiere', $annee)";
    if ($conn->query($sql) === TRUE) {
        echo "Stagiaire ajouté avec succès.";
    } else {
        echo "Erreur : " . $conn->error;
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Stagiaire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Ajouter un stagiaire</h2>
    <form method="POST">
        <label>Nom :</label><br>
        <input type="text" name="nom" required><br><br>
        <label>Prénom :</label><br>
        <input type="text" name="prenom" required><br><br>
        <label>Filière :</label><br>
        <input type="text" name="filiere" required><br><br>
        <label>Année :</label><br>
        <input type="number" name="annee" required><br><br>
        <button type="submit">Ajouter</button>
    </form>
</div>
</body>
</html>

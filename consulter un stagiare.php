<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $conn = new mysqli('localhost', 'root', '', 'gestion_stagiaires');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM stagiaires WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Nom : " . $row['nom'] . "<br>";
        echo "Prénom : " . $row['prenom'] . "<br>";
        echo "Filière : " . $row['filiere'] . "<br>";
        echo "Année : " . $row['annee'] . "<br>";
    } else {
        echo "Aucun stagiaire trouvé avec cet ID.";
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Consulter un Stagiaire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Consulter un stagiaire</h2>
    <form method="POST">
        <label>ID du stagiaire :</label><br>
        <input type="number" name="id" required><br><br>
        <button type="submit">Rechercher</button>
    </form>
</div>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION["utilisateur"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

$titre = $_POST["titre"];
$description = $_POST["description"];
$voitureId = $_POST["voitureId"];

$connexion = new mysqli ("localhost", "root", "root", "alex");


$query = 'insert into `voiturecaracteristique` (`Titre`, `description`,`voitureId`) VALUES (?, ?, ?)';
$stmt = $connexion->prepare($query);
$stmt->bind_param("ssi", $titre, $description, $voitureId);
$stmt->execute();
header("Location: ../admin/admin_voiture.php?id=$voitureId");
?>


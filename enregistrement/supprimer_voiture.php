<?php
session_start();

if (!isset($_SESSION["utilisateur"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

$id = intval($_GET["id"]);

$connexion = new mysqli ("localhost", "root", "root", "alex");

$query = 'DELETE FROM `VoitureOccasion` WHERE Id = ?';

$stmt = $connexion->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: ../admin/admin_voitures.php");

?>


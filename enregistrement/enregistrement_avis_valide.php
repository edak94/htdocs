<?php
session_start();
if (!isset($_SESSION["utilisateur"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

$id = intval($_GET["id"]);
$statut = $_POST["statuts"];

$connexion = new mysqli ("localhost", "root", "root", "alex");

$query = 'update  `avisclient` SET `Statut` = ? WHERE Id = ?';
$stmt = $connexion->prepare($query);
$stmt->bind_param("si", $statut,  $id);
$stmt->execute();

header("Location: ../admin/admin_avis_detail.php?id=$id");

?>


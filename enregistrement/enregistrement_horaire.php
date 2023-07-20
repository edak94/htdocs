<?php
session_start();
if (!isset($_SESSION["utilisateur"]) || (isset($_SESSION["utilisateur"]) && $_SESSION["role"] != "ADMIN")) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

$texte = $_POST["texte"];

$connexion = new mysqli ("localhost", "root", "root", "alex");
$query = 'update `Horaire` SET `Texte` = ? WHERE Id = 1';
$stmt = $connexion->prepare($query);
$stmt->bind_param("s", $texte);
$stmt->execute();

header("Location: ./../admin/admin_horaire.php");
?> 


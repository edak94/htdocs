<?php
$nom = $_POST["nom"];
$email = $_POST["email"];
$message = $_POST["avis"];
$note = $_POST["note"];
$statut = "NEW";

$connexion = new mysqli ("localhost", "root", "root", "alex");
$query = 'insert into `AvisClient` (`Nom`,`Email`,`Commentaire`, `Note`, `Statut`) VALUES (?, ?, ?, ?, ?)';
$stmt = $connexion->prepare($query);
$stmt->bind_param("sssis", $nom, $email, $message, $note, $statut);
$stmt->execute();

header("Location: ./../avis_poste.php");
?> 


<?php
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$message = $_POST["message"];
$telephone = $_POST["telephone"];

$connexion = new mysqli ("localhost", "root", "root", "alex");
$query = 'insert into `FormulaireContact` (`Prenom`, `Nom`,`Email`,`FormulaireContactMessage`, `Telephone`) VALUES (?, ?, ?, ?, ?)';
$stmt = $connexion->prepare($query);
$stmt->bind_param("sssss", $prenom, $nom, $email, $message, $telephone);
$stmt->execute();

header("Location: ../contact_poste.php");
?>


<?php
session_start();
if (!isset($_SESSION["utilisateur"]) || (isset($_SESSION["utilisateur"]) && $_SESSION["role"] != "ADMIN")) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

$id = intval($_POST["id"]);
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$role = $_POST["userRole"];
$motDePasse = $_POST["motDePasse"] != null ? md5("ALEX" . $_POST["motDePasse"]) : null;

$connexion = new mysqli ("localhost", "root", "root", "alex");

if ($id == null) {
    $query = 'insert into `Utilisateur` (`Nom`, `Prenom`,`Email`,`UserRole`, `UserPassword`) VALUES (?, ?, ?, ?, ?)';

    $stmt = $connexion->prepare($query);
    $stmt->bind_param("sssss", $nom, $prenom, $email, $role, $motDePasse);
    $stmt->execute();
    header("Location: ../admin/admin_utilisateur.php?id=$stmt->insert_id");

} else {
    if ($motDePasse != null) {
        $query = 'update  `Utilisateur` SET `Nom` = ?, `Prenom` = ?,`Email` = ?,`UserRole` = ?, `UserPassword` = ? WHERE Id = ?';
        $stmt = $connexion->prepare($query);
        $stmt->bind_param("sssssi", $nom, $prenom, $email, $role, $motDePasse, $id);
        $stmt->execute();
        header("Location: ../admin/admin_utilisateur.php?id=$id");

    } else {
        $query = 'update  `Utilisateur` SET `Nom` = ?, `Prenom` = ?,`Email` = ?,`UserRole` = ? WHERE Id = ?';
        echo $query;
        $stmt = $connexion->prepare($query);
        $stmt->bind_param("ssssi", $nom, $prenom, $email, $role, $id);
        $stmt->execute();
        header("Location: ../admin/admin_utilisateur.php?id=$id");

    }
}
?>


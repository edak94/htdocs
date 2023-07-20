<?php
session_start();

if (!isset($_SESSION["utilisateur"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

$id = intval($_POST["id"]);
$marque = $_POST["marque"];
$model = $_POST["model"];
$annee = intval($_POST["annee"]);
$prix = intval($_POST["prix"]);
$kilometrage = intval($_POST["kilometrage"]);
$description = $_POST["description"];
$statut = $_POST["statuts"];
$titre = "$marque - $model ($annee)";

$path_parts = pathinfo($_FILES["photo"]["name"]);
$extension = isset($path_parts['extension']) != null ? $path_parts['extension'] : null;

if(isset($extension)){
    $target_dir = "../voiture/";
}

$connexion = new mysqli ("localhost", "root", "root", "alex");

if ($id == null) {
    $query = 'insert into `VoitureOccasion` (`Titre`, `Marque`,`Model`,`Annee`, `Prix`, `Kilometrage`, `Description`, `Statuts`, `Photo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

    $stmt = $connexion->prepare($query);
    $stmt->bind_param("sssiiisss", $titre, $marque, $model, $annee, $prix, $kilometrage, $description, $statut, $extension);
    $stmt->execute();

    $target_file = $target_dir . $stmt->insert_id . "." . $extension;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    header("Location: ../admin/admin_voiture.php?id=$stmt->insert_id");
} else {
    if (isset($extension)) {
        $query = 'update  `VoitureOccasion` SET `Titre` = ?, `Marque` = ?,`Model` = ?,`Annee` = ?, `Prix` = ?, `Kilometrage` = ?, `Description` = ?, `Statuts` = ?, `Photo` = ? WHERE Id = ?';
        $stmt = $connexion->prepare($query);
        $stmt->bind_param("sssiiisssi", $titre, $marque, $model, $annee, $prix, $kilometrage, $description, $statut, $extension, $id);
        $stmt->execute();

        $target_file = $target_dir . $id . "." . $extension;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

        header("Location: ../admin/admin_voiture.php?id=$id");
    } else {
        $query = 'update  `VoitureOccasion` SET `Titre` = ?, `Marque` = ?,`Model` = ?,`Annee` = ?, `Prix` = ?, `Kilometrage` = ?, `Description` = ?, `Statuts` = ? WHERE Id = ?';
        echo $query;
        $stmt = $connexion->prepare($query);
        $stmt->bind_param("sssiiissi", $titre, $marque, $model, $annee, $prix, $kilometrage, $description, $statut, $id);
        $stmt->execute();
        header("Location: ../admin/admin_voiture.php?id=$id");
    }
}
?>


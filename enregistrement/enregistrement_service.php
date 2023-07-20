<?php
session_start();
if (!isset($_SESSION["utilisateur"]) || (isset($_SESSION["utilisateur"]) && $_SESSION["role"] != "ADMIN")) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

$id = intval($_POST["id"]);
$titre = $_POST["titre"];
$description = $_POST["description"];

$path_parts = pathinfo($_FILES["photo"]["name"]);
$extension = isset($path_parts['extension']) != null ? $path_parts['extension'] : null;

if(isset($extension)){
    $target_dir = "../img/service/";
}

$connexion = new mysqli ("localhost", "root", "root", "alex");

if ($id == null) {
    $query = 'insert into `Service` (`Titre`, `ServiceDescription`, `Photo`) VALUES (?, ?,  ?)';

    $stmt = $connexion->prepare($query);
    $stmt->bind_param("sss", $titre,  $description, $extension);
    $stmt->execute();

    $target_file = $target_dir . $stmt->insert_id . "." . $extension;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    header("Location: ../admin/admin_service.php?id=$stmt->insert_id");
} else {
    if (isset($extension)) {
        $query = 'update  `Service` SET `Titre` = ?, `ServiceDescription` = ?, `Photo` = ? WHERE Id = ?';
        $stmt = $connexion->prepare($query);
        $stmt->bind_param("sssi", $titre, $description, $extension, $id);
        $stmt->execute();

        $target_file = $target_dir . $id . "." . $extension;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

        header("Location: ../admin/admin_service.php?id=$id");
    } else {
        $query = 'update  `Service` SET `Titre` = ?, `ServiceDescription` = ? WHERE Id = ?';
        echo $query;
        $stmt = $connexion->prepare($query);
        $stmt->bind_param("ssi", $titre, $description, $id);
        $stmt->execute();
        header("Location: ../admin/admin_service.php?id=$id");
    }
}
?>


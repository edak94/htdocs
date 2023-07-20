<?php
session_start();
$error = false;

if (isset($_POST['email'])) {


    $email =  $_POST['email'];
    $motdepasse =  md5("ALEX" . $_POST['motdepasse']);

    $connexion = new mysqli ("localhost", "root", "root", "alex");

    $query = "SELECT Prenom, Nom, UserRole  FROM `Utilisateur` WHERE `Email` = ? and `UserPassword`  = ?";
    $stmt = $connexion->prepare($query);
    $stmt->bind_param("ss", $email, $motdepasse);
    $stmt->execute();

    $row = $stmt->get_result()->fetch_row();
    if(empty($row)){
        $error = true;
    } else{
        $_SESSION["utilisateur"] = $row[0] . " " . $row[1];
        $_SESSION["role"] = $row[2];

        header("Location: index.php");
    }
}
?>

<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Garage V.PARROT - MECANIQUE CARROSSERIE PEINTURE ACHAT VENTE </title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description"
          content="Garage automobile à Limeil Brevannes dans le Val de Marne, spécialisé dans la reprogrammation éléctronique automobile, mécanique, carrosserie, peinture, et dépanage. Nous proposons un service de carte grise.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon"/>

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/layout.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="./library/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="./library/fontawesome/css/brands.css">
    <link rel="stylesheet" href="./library/fontawesome/css/solid.css">


    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .formulaire {
            max-width: 300px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }

        .formulaire h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }

        .formulaire label,
        .formulaire input[type="text"],
        .formulaire input[type="password"],
        .formulaire input[type="submit"] {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #dddddd;
            border-radius: 3px;
            font-size: 16px;
        }

        .formulaire input[type="submit"] {
            background-color: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .formulaire input[type="submit"]:hover {
            background-color: blue;
        }
    </style>
</head>
<body>

<?php
require_once("./layout/header.php");
?>

<div class="formulaire">
    <h2>Connexion</h2>
    <h6 style="color: red; display: <?php if (!$error) { echo "none"; } ?>" >Connexion invalide</h6>
    <form action="#" method="POST">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Mot de passe:</label>
        <input type="password" id="motdepasse" name="motdepasse" required>

        <input type="submit" value="Se connecter">
    </form>
</div>

<?php
require_once('./layout/footer.php');
?>

</body>
</html>

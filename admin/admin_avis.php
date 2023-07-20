<?php
    session_start();
    if(!isset($_SESSION["utilisateur"])){
        header("HTTP/1.1 401 Unauthorized");
        exit;
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
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon"/>

    <!-- Main Stylesheet -->
    <!--    <link rel="stylesheet" href="./css/style.css">-->
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/boutique.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="../library/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="../library/fontawesome/css/brands.css">
    <link rel="stylesheet" href="../library/fontawesome/css/solid.css">

    <!-- Responsive css -->
    <!--    <link rel="stylesheet" href="css/responsive.css">-->
</head>

<body>

<?php
require_once('layout/header.php');
require_once('admin_avis_liste.php');
require_once('layout/footer.php');
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>


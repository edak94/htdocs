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

$id = intval($_GET["id"]);

$connexion = new mysqli ("localhost", "root", "root", "alex");
$query = 'SELECT * FROM `avisclient` WHERE `Id` = ?';
$stmt = $connexion->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$avis = $stmt->get_result()->fetch_array();


?>



<div class="container-lg">
    <div class="row">
        <div class="col-md-3">Nom:<?php echo $avis["Nom"] ?></div>
        <div class="col-md-3">Email:<?php echo $avis["Email"] ?></div>
        <div class="col-md-3">Note:<?php echo $avis["Note"] ?></div>
        <div class="col-md-3">Statut:<span class="badge bg-<?php echo $avis["Statut"] == "VALIDE" ? "primary" : "danger" ?>" ><?php echo $avis["Statut"] ?></span></div>
        <div class="col-md-12"><?php echo $avis["Commentaire"] ?></div>
        <div class="col-md-2">
            <button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Modifer Statut</button>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="EditerAvis" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVoitureodalLabel">Editer la fiche</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                require_once('../form/form_avis_valide.php');
                ?>
            </div>
        </div>
    </div>
</div>


<?require_once('layout/footer.php');
?>


<!-- All JS Plugins -->
<!--<script src="js/plugins.js"></script>-->
<!-- Main JS -->
<!--<script src="js/main.js"></script>-->

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


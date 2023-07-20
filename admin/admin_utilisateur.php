<?php
    session_start();
    if (!isset($_SESSION["utilisateur"]) || (isset($_SESSION["utilisateur"]) && $_SESSION["role"] != "ADMIN")) {
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
$query = 'SELECT * FROM `utilisateur` WHERE `Id` = ?';
$stmt = $connexion->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$utilisateur = $stmt->get_result()->fetch_array();


?>

<div class="container-lg">
    <div class="row">
        <div class="col-md-3">Nom:<?php echo $utilisateur["Nom"] ?></div>
        <div class="col-md-3">Prenom:<?php echo $utilisateur["Prenom"] ?></div>
        <div class="col-md-3">Email:<?php echo $utilisateur["Email"] ?></div>
        <div class="col-md-3">Role:<?php echo $utilisateur["UserRole"] ?></div>
        <div class="col-md-2">
            <button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Modifer l'utilisateur</button>
            <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Supprimer l'utilisateur</button>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="EditerUtilisateur" aria-hidden="true">
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
                require_once('../form/form_utilisateur.php');
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="SupprimerUtilisateur" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supprimeModalLabel"><i class="fa fa-trash"></i>Supprimer l'utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Etes-vous sur de supprimer l'utilisateur?
            </div>
            <div class="modal-footer">
                <a href="../enregistrement/supprimer_utilisateur.php?id=<?php echo $utilisateur["Id"]?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
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


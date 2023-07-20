<?php

if (!isset($_SESSION["utilisateur"]) || (isset($_SESSION["utilisateur"]) && $_SESSION["role"] != "ADMIN")) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

$id = intval($_GET["id"]);

$connexion = new mysqli ("localhost", "root", "root", "alex");
$query = 'SELECT * FROM `Service` WHERE `Id` = ?';
$stmt = $connexion->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$service = $stmt->get_result()->fetch_array();

?>

<div class="container-lg">
    <div class="row">
        <div class="col-md-5">
            <div class="product-img">
                <a href="product-details.html"><img src="../img/service/<?php echo $service["Id"] .".".$service["Photo"]?>" alt="#"></a>
            </div>
        </div>
        <div class="col-md-7">
            <h2 class="text-center"><?php echo $service["Titre"]; ?></h2>

            <p style="margin-top: 50px;"><?php echo $service["ServiceDescription"] ?></p>

            <div class="row">
                <button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#editModal"><i class="fa fa-add"></i> Modifer la fiche</button>
                <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#deleteServiceModal"><i class="fa fa-trash"></i> Supprimer la service</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="deleteServiceModal" tabindex="-1" role="dialog" aria-labelledby="SupprimerService" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supprimeModalLabel"><i class="fa fa-trash"></i>Supprimer la service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Etes-vous sur de supprimer la service?
            </div>
            <div class="modal-footer">
                <a href="../enregistrement/supprimer_service.php?id=<?php echo $service["Id"]?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="EditerService" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceodalLabel">Editer la fiche</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                require_once('../form/form_service.php');
                ?>
            </div>
        </div>
    </div>
</div>

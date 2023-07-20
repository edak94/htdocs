<?php
$id = intval($_GET["id"]);

$connexion = new mysqli ("localhost", "root", "root", "alex");
$query = 'SELECT * FROM `VoitureOccasion` WHERE `Id` = ?';
$stmt = $connexion->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$voiture = $stmt->get_result()->fetch_array();


$queryOption = 'SELECT * FROM `voiturecaracteristique` WHERE `VoitureId` = ?';
$stmt = $connexion->prepare($queryOption);
$stmt->bind_param("i", $id);
$stmt->execute();
$voitureOptions = $stmt->get_result();

?>

<div class="container-lg">
    <div class="row">
        <div class="col-md-8">
            <div class="product-img">
                <a href="product-details.html"><img src="voiture/<?php echo $voiture["Id"] .".".$voiture["Photo"]?>" alt="#"></a>
            </div>
        </div>
        <div class="col-md-4">
            <h2><?php echo $voiture["Marque"] . " - " . $voiture["Model"]; ?></h2>
            <h4><?php echo $voiture["Prix"] ?>€</h4>

            <div class="row">
                <div class="col-md-6" style="font-size: large; font-weight: bold; color: red;">Kilométrage</div>
                <div class="col-md-6"><?php echo $voiture["Kilometrage"] ?></div>
            </div>
            <div class="row">
                <div class="col-md-6" style="font-size: large; font-weight: bold; color: red;">Année</div>
                <div class="col-md-6"><?php echo $voiture["Annee"] ?></div>
            </div>


            <?php
            while ( $voitureOption = $voitureOptions->fetch_array()) {
            ?>
                <div class="row">
                    <div class="col-md-6" style="font-size: large; font-weight: bold; color: red;"><?php echo $voitureOption["Titre"] ?></div>
                    <div class="col-md-6"><?php echo $voitureOption["Description"] ?></div>
                </div>
            <?php } ?>
            <p style="margin-top: 50px;"><?php echo $voiture["Description"] ?></p>

            <div class="row">
                <button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#contactModal"><i class="fa fa-envelope"></i> Contacter</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="Contact" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOPtionModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                require_once('form/form_contact.php');
                ?>
            </div>
        </div>
    </div>
</div>



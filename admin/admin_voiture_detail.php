<?php
if (!isset($_SESSION["utilisateur"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

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
                <a href="product-details.html"><img src="../voiture/<?php echo $voiture["Id"] .".".$voiture["Photo"]?>" alt="#"></a>
            </div>
        </div>
        <div class="col-md-4">
            <h2><?php echo $voiture["Marque"] . " - " . $voiture["Model"]; ?> <span class="badge bg-<?php echo $voiture["Statuts"] == "VENDU" ? "danger" : "primary" ?>" ><?php echo $voiture["Statuts"] ?></span></h2>
            <h4><?php echo $voiture["Prix"] ?>€</h4>

            <div class="row">
                <div class="col-md-6" style="font-size: large; font-weight: bold; color: red;">Kilométrage</div>
                <div class="col-md-6"><?php echo $voiture["Kilometrage"] ?></div>
            </div>
            <div class="row">
                <div class="col-md-6" style="font-size: large; font-weight: bold; color: red;">Année</div>
                <div class="col-md-6"><?php echo $voiture["Annee"] ?></div>
            </div>

            <p style="margin-top: 50px;"><?php echo $voiture["Description"] ?></p>

            <div class="row">
                <button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#editModal"><i class="fa fa-add"></i> Modifer la fiche</button>
                <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#deleteVoitureModal"><i class="fa fa-trash"></i> Supprimer la voiture</button>
            </div>
        </div>
    </div>
</div>

<div class="container-lg" style="margin-top: 25px;">
    <div class="row">
        <h2>Options</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Text</th>
                <th scope="col">Option</th>
            </tr>
            </thead>
            <tbody>

            <?php
            while ( $voitureOption = $voitureOptions->fetch_array() ) {
                ?>
                <tr>
                    <td><?php echo $voitureOption["Titre"] ?></td>
                    <td><?php echo $voitureOption["Description"] ?></td>
                    <td><a href="../enregistrement/supprimer_voiture_option.php?id=<?php echo $voitureOption["Id"]?>&voitureId=<?php echo $voitureOption["VoitureId"]?>"><i class="fa fa-trash"></i></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <button class="btn btn-secondary" type="submit" data-toggle="modal" data-target="#addModal"><i class="fa fa-add"></i> Ajouter une option</button>
    </div>
</div>

<div class="modal fade" id="deleteVoitureModal" tabindex="-1" role="dialog" aria-labelledby="SupprimerVoiture" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supprimeModalLabel"><i class="fa fa-trash"></i>Supprimer la voiture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Etes-vous sur de supprimer la voiture?
            </div>
            <div class="modal-footer">
                <a href="../enregistrement/supprimer_voiture.php?id=<?php echo $voiture["Id"]?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="EditerVoiture" aria-hidden="true">
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
                require_once('../form/form_voiture.php');
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="AjouterVoitureOption" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOPtionModalLabel">Ajouter une option</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                require_once('../form/form_voiture_caracteristique.php');
                ?>
            </div>
        </div>
    </div>
</div>
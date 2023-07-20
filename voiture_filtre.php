<?php

$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$marque = isset($_GET["marque"]) ? $_GET["marque"] : null;
$prixMax = isset($_GET["prixMax"]) ? $_GET["prixMax"] : null;
$prixMin = isset($_GET["prixMin"]) ? $_GET["prixMin"] : null;
$anneeMax = isset($_GET["anneeMax"]) ? $_GET["anneeMax"] : null;
$anneeMin = isset($_GET["anneeMin"]) ? $_GET["anneeMin"] : null;
$kilometreMax = isset($_GET["kilometreMax"]) ? $_GET["kilometreMax"] : null;
$kilometreMin = isset($_GET["kilometreMin"]) ? $_GET["kilometreMin"] : null;

$connexion = new mysqli ("localhost", "root", "root", "alex");
$query = 'SELECT * FROM `voitureoccasion` ';

$filters = [];
$filterString = "";
$filterQuery = "";

if($marque != null){
    $filterQuery .= "Marque = ? AND ";
    array_push($filters, $marque);
    $filterString .= "s";
}
if($prixMax != null){
    $filterQuery .= "Prix <= ? AND ";
    array_push($filters, intval($prixMax));
    $filterString .= "i";
}
if($prixMin != null){
    $filterQuery .= "Prix >= ? AND ";
    array_push($filters, intval($prixMin));
    $filterString .= "i";
}
if($anneeMax != null){
    $filterQuery .= "Annee <= ? AND ";
    array_push($filters, intval($anneeMax));
    $filterString .= "i";
}
if($anneeMin != null){
    $filterQuery .= "Annee >= ? AND ";
    array_push($filters, intval($anneeMin));
    $filterString .= "i";
}
if($kilometreMax != null){
    $filterQuery .= "Kilometrage <= ? AND ";
    array_push($filters, intval($kilometreMax));
    $filterString .= "i";
}
if($kilometreMin != null){
    $filterQuery .= "Kilometrage >= ? AND ";
    array_push($filters, intval($kilometreMin));
    $filterString .= "i";
}

$query .= $filterQuery != "" ? " WHERE " . $filterQuery : "";

if(substr($query, -4) == "AND "){
    $query = substr($query, 0, -4);
}
$query .= " LIMIT 15 OFFSET ?";

$offset = 15*($page-1);
$filterString .= 'i';
array_push($filters, $offset);

$stmt = $connexion->prepare($query);
$stmt->bind_param($filterString, ...$filters);

$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container-lg" style="margin-top: 25px;">
    <div class="row">
        <?php
        while ( $row = $result->fetch_array() ) {
            ?>
            <div class="col-lg-3 col-sm-6 col-6">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="voiture.php?id=<?php echo $row["Id"]; ?>"><img src="voiture/<?php echo $row["Id"] . "." . $row["Photo"] ?>"></a>
                    </div>
                    <div class="product-info">
                        <h2 class="product-title"><a href="voiture.php?id=<?php echo $row["Id"]; ?>"><?php echo $row["Marque"] ?> - <?php echo $row["Model"] ?></a></h2>
                        <div class="product-price">
                            <span><?php echo $row["Prix"] ?>€</span>
                        </div>
                        <div class="product-info-brief">
                            <ul>
                                <li>
                                    <i class="fas fa-car"></i><?php echo $row["Annee"] ?>
                                </li>
                                <li>
                                    <i class="fas fa-road"></i><?php echo $row["Kilometrage"] ?>km
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

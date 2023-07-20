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
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Marque</th>
                <th scope="col">Model</th>
                <th scope="col">Prix</th>
                <th scope="col">Année</th>
                <th scope="col">Kilometrage</th>
                <th scope="col">Statut</th>
                <th scope="col">Option</th>
            </tr>
            </thead>
            <tbody>

            <?php
            while ( $row = $result->fetch_array() ) {
                ?>
                <tr>
                    <td><?php echo $row["Marque"] ?></td>
                    <td><?php echo $row["Model"] ?></td>
                    <td><?php echo $row["Prix"] ?></td>
                    <td><?php echo $row["Annee"] ?></td>
                    <td><?php echo $row["Kilometrage"] ?></td>
                    <td><span class="badge bg-<?php echo $row["Statuts"] == "VENDU" ? "danger" : "primary" ?>" ><?php echo $row["Statuts"] ?></span></td>
                    <td><a href="admin_voiture.php?id=<?php echo $row["Id"]; ?>"><i class="fa fa-eye"></i></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
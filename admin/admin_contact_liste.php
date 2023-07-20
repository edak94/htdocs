<?php

if (!isset($_SESSION["utilisateur"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$nom = isset($_GET["nom"]) ? $_GET["nom"] : null;

$connexion = new mysqli ("localhost", "root", "root", "alex");
$query = 'SELECT * FROM `formulairecontact` ';

$filters = [];
$filterString = "";
$filterQuery = "";

if($nom != null){
    $filterQuery .= "Nom = ? AND ";
    array_push($filters, $nom);
    $filterString .= "s";
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

<div class="container-lg">
    <div class="row">
        <form action="#" method="get">
            <div class="row">
                <div class="form-group col-md-3 col-sm-6">
                    <label for="nom">Nom:</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom?>">
                </div>
            </div>
            <div class="row" style="margin-top: 25px;">
                <button class="btn btn-primary" type="submit"><i class="fa fa-filter"></i> Filtrer</button>
            </div>
        </form>
    </div>
</div>

<div class="container-lg" style="margin-top: 25px;">
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Telephone</th>
                <th scope="col">Option</th>
            </tr>
            </thead>
            <tbody>

            <?php
            while ( $row = $result->fetch_array() ) {
            ?>
            <tr>
                <td><?php echo $row["Nom"] ?></td>
                <td><?php echo $row["Prenom"] ?></td>
                <td><?php echo $row["Email"] ?></td>
                <td><?php echo $row["Telephone"] ?></td>
                <td><a href="admin_contact_detail.php?id=<?php echo $row["Id"]; ?>"><i class="fa fa-eye"></i></a></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container-lg text-center" style="margin-top: 25px;">
    <a href="?<?php echo $page == 1 ? $_SERVER['QUERY_STRING']."&page=".$page : $_SERVER['QUERY_STRING']."&page=".$page - 1; ?>"><i class="fa fa-arrow-left"></i> Page Précedente</a>
    ...
    <a href="?<?php echo $_SERVER['QUERY_STRING']."&page=".($page + 1); ?>">Page Suivante <i class="fa fa-arrow-right"></i></a>
</div>
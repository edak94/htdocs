<?php



$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$marque = isset($_GET["marque"]) ? $_GET["marque"] : null;
$prixMax = isset($_GET["prixMax"]) ? $_GET["prixMax"] : null;
$prixMin = isset($_GET["prixMin"]) ? $_GET["prixMin"] : null;
$anneeMax = isset($_GET["anneeMax"]) ? $_GET["anneeMax"] : null;
$anneeMin = isset($_GET["anneeMin"]) ? $_GET["anneeMin"] : null;
$kilometreMax = isset($_GET["kilometreMax"]) ? $_GET["kilometreMax"] : null;
$kilometreMin = isset($_GET["kilometreMin"]) ? $_GET["kilometreMin"] : null;
?>

<script>
    var page = <?php echo $page ?>;

    function getVoiture(str) {
        if (str == "") {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.withCredentials = true;
            xmlhttp.open("GET", "voiture_filtre.php?page=" + page, true);
            xmlhttp.send();
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.withCredentials = true;
            xmlhttp.open("GET", "voiture_filtre.php?" + str + "&page=" + page, true);
            xmlhttp.send();
        }
    }

    function onLoadFunctions() {
        getVoiture();
    }

    function filter() {
        const formData = new FormData((document.getElementById('formFilter')));
        const queryString = new URLSearchParams(formData).toString();
        getVoiture(queryString);
    }

    function nextPage() {
        page += 1;
        filter();
    }

    function previousPage() {
        page -= 1;

        if(page == 0){
            page = 1;
        }
        filter();
    }

    window.onload = onLoadFunctions;
</script>

<div class="container-lg">
    <div class="row">
        <form id="formFilter" action="#" method="get">
            <div class="row">
                <div class="form-group col-md-3 col-sm-6">
                    <label for="marque">Marque:</label>
                    <input type="text" class="form-control" id="marque" name="marque" value="<?php echo $marque?>">
                </div>
                <div class="form-group col-md-3  col-sm-6">
                    <label for="prixMin">Prix:</label>
                    <input type="number" class="form-control" id="prixMin" name="prixMin" placeholder="Min" value="<?php echo $prixMin?>">
                    <input type="number" class="form-control" id="prixMax" name="prixMax" placeholder="Max" value="<?php echo $prixMax?>">
                </div>
                <div class="form-group col-md-3  col-sm-6">
                    <label for="kilometreMin">Kilometrage:</label>
                    <input type="number" class="form-control" id="kilometreMin" name="kilometreMin" placeholder="Min" value="<?php echo $kilometreMin?>">
                    <input type="number" class="form-control" id="kilometreMax" name="kilometreMax" placeholder="Max" "value="<?php echo $kilometreMax?>">
                </div>
                <div class="form-group col-md-3 col-sm-6">
                    <label for="anneeMin">Année:</label>
                    <input type="number" class="form-control" id="anneeMin" name="anneeMin" placeholder="Min" value="<?php echo $anneeMin?>">
                    <input type="number" class="form-control" id="anneeMax" name="anneeMax" placeholder="Max" value="<?php echo $anneeMax?>">
                </div>
            </div>
            <div class="row" style="margin-top: 25px;">
                <button class="btn btn-primary" type="button" onclick="filter()"><i class="fa fa-filter"></i> Filtrer
                </button>
            </div>
        </form>
    </div>
</div>

<div id="txtHint"><b>Chargement</b></div>

<div class="container-lg text-center" style="margin-top: 25px;">
    <bouton class="btn btn-primary"
            onclick="previousPage()"><i
                class="fa fa-arrow-left"></i> Page Précedente
    </bouton>
    ...
    <bouton class="btn btn-primary" onclick="nextPage()">Page Suivante <i
                class="fa fa-arrow-right"></i></bouton>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php
require_once('layout/header.php');
$connexion = new mysqli ("localhost", "root", "root", "alex");
$query = 'SELECT * FROM `Horaire` where Id = 1';
$stmt = $connexion->prepare($query);
$stmt->execute();
$horaire = $stmt->get_result()->fetch_array();

?>

<footer>
        <div class="container-lg">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="phone-cont">
                        <a href="index.html"><img src="img/logo.png" width="50" alt="Logo"></a>

                        <div class="phone-cont">
                            <h6>Copyright <span id="current-year"></span> & Design By <a href="https://www.infotech-development.fr">Infotech Development</a></h6>
                            <br>
                            <h5> <?php echo $horaire["Texte"]?> </h5>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 align-self-center">
                    <div class="text-end">
                        <a href="./mentions_legales.php" class="mention-legale">Mentions Légales</a><br>
                        <a href="" class="mention-legale">RGPD</a>
                    </div>
                </div>
            </div>
        </div>
</footer>

<script>
    document.getElementById("current-year").innerHTML = new Date().getFullYear();
    //$("current-year").text((new Date).getFullYear());
</script>

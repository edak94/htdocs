<?php

$connexion = new mysqli ("localhost", "root", "root", "alex");
$query = 'SELECT * FROM `AvisClient` WHERE `Statut` = "VALIDE"';
$stmt = $connexion->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

?>

<div class="text-center" style="margin-top: 50px;">
    <h2>Que pensez vous de nous?</h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
            <?php
                $j = 0;
                while ( $row = $result->fetch_array() ) {
                    $j++;
            ?>

            <div class="carousel-item <?php echo $j == 1 ? "active" : "" ?> ">
                <div class="star-rating">
                    <ul class="list-inline">
                        <?php
                            for($i = 0; $i < $row["Note"]; $i++){
                                echo '<li class="list-inline-item"><i class="fa fa-star"></i></li>';
                            }
                        ?>
                    </ul>
                </div>
                <p class="testimonial"><?php echo $row["Commentaire"] ?></p>
                <p class="overview"><b><?php echo $row["Nom"] ?></b></p>
            </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>

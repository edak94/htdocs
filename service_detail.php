<?php
$connexion = new mysqli ("localhost", "root", "root", "alex");
$query = 'SELECT * FROM `Service`';
$stmt = $connexion->prepare($query);
$stmt->execute();
$services = $stmt->get_result();

?>


    <div class="accordion" id="accordionExample">
        <?php
            $i = 0;
            while ($service = $services->fetch_array()){
                $i++;
        ?>

        <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>"
                        aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                    <?php echo $service["Titre"]; ?>
                </button>
            </h2>
            <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php echo $i == 1 ? "show" : ""?>" aria-labelledby="heading<?php echo $i; ?>"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="product-img">
                                <img src="img/service/<?php echo $service["Id"] . "." . $service["Photo"] ?>">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h2><?php echo $service["Titre"]; ?></h2>
                            <p><?php echo $service["ServiceDescription"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

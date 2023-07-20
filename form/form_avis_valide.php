<div style="margin-top: 50px;">
    <h2 class="text-center">Avis</h2>

    <form action="../enregistrement/enregistrement_avis_valide.php?id=<?php echo $avis["Id"];?>" method="POST">

        <div class="form-group">
            <label for="photo">Statut:</label>
            <select class="form-select" name="statuts" aria-label="">
                <option <?php echo $avis["Statut"] == "NEW" ? "selected" : "";?> value="NEW">NEW</option>
                <option <?php echo $avis["Statut"] == "VALIDE" ? "selected" : "";?> value="VALIDE">VALIDE</option>
                <option <?php echo $avis["Statut"] == "NON VALIDE" ? "selected" : "";?> value="NON VALIDE">NON VALIDE</option>
            </select>
        </div>

        <div style="margin: 10px;">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div style="margin-top: 50px;">
    <form action="../enregistrement/enregistrement_voiture.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo isset($voiture) ? $voiture["Id"] : null;?>" required>
        </div>

        <div class="form-group">
            <label for="nom">Marque:</label>
            <input type="text" class="form-control" id="marque" name="marque" value="<?php echo isset($voiture) ? $voiture["Marque"] : null;?>" required>
        </div>

        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" class="form-control" id="model" name="model" value="<?php echo isset($voiture) ? $voiture["Marque"] : null;?>" required>
        </div>

        <div class="form-group">
            <label for="prix">Prix:</label>
            <input type="number" class="form-control" id="prix" name="prix" value="<?php echo isset($voiture) ? $voiture["Prix"] : null;?>" required>
        </div>

        <div class="form-group">
            <label for="annee">Année:</label>
            <input type="number" class="form-control" id="annee" name="annee" value="<?php echo isset($voiture) ? $voiture["Annee"] : null;?>" required>
        </div>

        <div class="form-group">
            <label for="kilometrage">kilométrage:</label>
            <input type="number" class="form-control" id="kilometrage" name="kilometrage" value="<?php echo isset($voiture) ? $voiture["Kilometrage"] : null;?>" required>
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>

        <div class="form-group">
            <label for="photo">Statut:</label>
            <select class="form-select" name="statuts" aria-label="">
                <option selected value="EN VENTE">EN VENTE</option>
                <option value="VENDU">VENDU</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="avis" class="form-control" name="description" required><?php echo isset($voiture) ? $voiture["Description"] : null;?></textarea>
        </div>

        <div class="text-center" style="margin-top: 25px;">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>
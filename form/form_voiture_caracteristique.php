<div style="margin-top: 50px;">
    <form action="../enregistrement/enregistrement_voiture_caracteristique.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nom">Titre:</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="avis" class="form-control" name="description" required></textarea>
        </div>

        <input type="hidden" class="form-control" id="voitureId" name="voitureId" value="<?php echo $id; ?>" required>

        <div class="text-center" style="margin-top: 25px;">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>
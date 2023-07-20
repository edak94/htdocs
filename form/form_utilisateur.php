<div style="margin-top: 50px;">
    <form action="../enregistrement/enregistrement_utilisateur.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo isset($utilisateur) ? $utilisateur["Id"] : null;?>" required>
        </div>

        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo isset($utilisateur) ? $utilisateur["Nom"] : null;?>" required>
        </div>

        <div class="form-group">
            <label for="nom">Prenom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo isset($utilisateur) ? $utilisateur["Prenom"] : null;?>" required>
        </div>

        <div class="form-group">
            <label for="nom">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($utilisateur) ? $utilisateur["Email"] : null;?>" required>
        </div>

        <div class="form-group">
            <label for="motDePasse">Mot de passe:</label>
            <input type="password" class="form-control" id="motDePasse" name="motDePasse"">
        </div>

        <div class="form-group">
            <label for="userRole">Role:</label>
            <select class="form-select" name="userRole" aria-label="">
                <option <?php echo isset($utilisateur) && $utilisateur["UserRole"] == "UTILISATEUR" ? "selected" : "";?> value="UTILISATEUR">UTILISATEUR</option>
                <option <?php echo isset($utilisateur) && $utilisateur["UserRole"] == "ADMIN" ? "selected" : "";?> value="ADMIN">ADMIN</option>
            </select>
        </div>

        <div class="text-center" style="margin-top: 25px;">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>
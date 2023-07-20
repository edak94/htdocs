<div style="margin-top: 50px;">
    <h2 class="text-center">Une question?</h2>

    <form action="enregistrement/enregistrement_contact.php" method="POST">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div>

        <div class="form-group">
            <label for="prenom">Prenom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone:</label>
            <input type="text" class="form-control" id="telephone" name="telephone">
        </div>

        <div class="form-group">
            <label for="message">Votre avis:</label>
            <textarea id="message" class="form-control" name="message" required><?php if(isset($voiture)) { echo "Bonjour, je suis intéréré par la voiture " . $voiture["Titre"] . "."; } ?></textarea>
        </div>

        <div style="margin: 10px;">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div>
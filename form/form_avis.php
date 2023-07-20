<div style="margin-top: 50px;">
    <h2 class="text-center">Donner votre avis</h2>

    <form action="enregistrement/enregistrement_avis.php" method="POST">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="email">Votre avis:</label>
            <textarea id="avis" class="form-control" name="avis" required></textarea>
        </div>

        <div class="form-group text-center" style="margin-top: 25px">
            <input type="radio" id="1-star-rating" name="note" value="1" class="etoile">
            <label for="1-star-rating" class="star-rating star etoilelabel">
                <i class="fa fa-star"></i>
            </label>

            <input type="radio" id="2-star-rating" name="note" value="2" class="etoile">
            <label for="2-star-rating" class="star-rating star etoilelabel">
                <i class="fa fa-star"></i>
            </label>

            <input type="radio" id="3-star-rating" name="note" value="3" class="etoile">
            <label for="3-star-rating" class="star-rating star etoilelabel">
                <i class="fa fa-star"></i>
            </label>

            <input type="radio" id="4-star-rating" name="note" value="4" class="etoile">
            <label for="4-star-rating" class="star-rating star etoilelabel">
                <i class="fa fa-star"></i>
            </label>

            <input type="radio" id="5-star-rating" name="note" value="5" class="etoile">
            <label for="5-star-rating" class="star-rating etoilelabel">
                <i class="fa fa-star"></i>
            </label>
        </div>

        <div style="margin: 10px;">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
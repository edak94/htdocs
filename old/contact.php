<!DOCTYPE html>
<html>
<head>

        <meta charset="utf-8">      
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Garage V.PARROT - MECANIQUE CARROSSERIE PEINTURE ACHAT VENTE - FORMULAIRE DE CONTACT </title>
        <meta name="robots" content="noindex, follow" />
        <meta name="description" content="Connexion à votre interface proffesionelle">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <script src="https://kit.fontawesome.com/60f0f8ad56.js" crossorigin="anonymous"></script>   
    
        <!-- Place favicon.png in the root directory -->
        <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon" />
        <!-- Font Icons css -->
        <link rel="stylesheet" href="css/font-icons.css">
        <!-- plugins css -->
        <link rel="stylesheet" href="css/plugins.css">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="../css/style.css">
        <!-- Responsive css -->
        <link rel="stylesheet" href="../css/responsive.css">
  
 
</head>

<body>

    <?php   
    require_once('header.php');
    
    ?>

    
  
<div class="container-contact">
    <h2>Formulaire de contact</h2>
    <form action="../enregistrement/enregistrement_contact.php" method="POST">
      <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
      </div>
      
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
      </div>
      
      <div class="form-group">
      <div class="bt-envoyer">
        <input type="submit" value="Envoyer">
        </div>
        </div>
    </form>
  </div>






  <?php   

  require_once('footer.php');
  ?>

</body>
</html>

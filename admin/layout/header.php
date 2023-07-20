<header>
    <div class="header ltn__header-top-area top-area-color-white plr--9">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="top-menu">
                        <ul>
                            <li>
                                <a href="mailto:v.parrot@gmail.com" class="header-info"><i
                                            class="fa-envelope fa icon-header"></i> v.parrot@gmail.com</a>
                            </li>
                            <li>
                                <a href="contact.html" class="header-info"><i class="fa-home fa icon-header"></i> 4
                                    Avenue de valenton, Limeil Brevannes, 94450.</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-end">
                        <div class="top-menu">
                            <ul>
                                <li>
                                    <div style="<?php  if(isset($_SESSION["utilisateur"])) { echo "display: none"; } ?>">
                                        <a href="connexion.php" title="Connexion" class="btn-connexion-cont"><i
                                                    class="btn-connexion">connexion</i></a>
                                    </div>
                                    <div style="color: white; <?php  if(!isset($_SESSION["utilisateur"])) { echo "display: none"; } ?>">
                                        Bonjour <?php  echo $_SESSION["utilisateur"] ?> <a href="deconnexion.php"><i class="fa fa-sign-out"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="../index.php"><img src="../img/logo.png" alt="Logo" height="101" width="75"></a>
                        </div>
                        <div class="phone-cont clearfix">
                            <div class="phone-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                        </div>
                        <div class="phone-cont clearfix">
                            <div class="phone-info">
                                <h6>Nous contacter</h6>
                                <h4><a href="tel:0695656111" class="phone-link">06 95 65 61 11</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column">
                    <div class="header-menu">
                        <nav class="navbar navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="main-menu collapse navbar-collapse" id="navbarNavDropdown">
                                <ul  class="navbar-nav mr-auto">
                                    <li class="header-menu-column nav-item">
                                        <a href="../index.php">ACCUEIL</a>
                                    </li>

                                    <li class="header-menu-column nav-item">
                                        <a href="admin_voitures.php">VOITURES</a>
                                    </li>

                                    <li class="header-menu-column" <?php echo !(isset($_SESSION["role"]) && $_SESSION["role"] == "ADMIN")  ? "style='display:none;'" : ""; ?>>
                                        <a href="admin_services.php">SERVICES</a>
                                    </li>

                                    <li class="header-menu-column" <?php echo !(isset($_SESSION["role"]) && $_SESSION["role"] == "ADMIN")  ? "style='display:none;'" : ""; ?>>
                                        <a href="admin_horaire.php">HORAIRE D'OUVERTURE</a>
                                    </li>

                                    <li class="header-menu-column">
                                        <a href="admin_avis.php">AVIS</a>
                                    </li>

                                    <li class="header-menu-column">
                                        <a href="admin_contact.php">CONTACT</a>
                                    </li>

                                    <li class="header-menu-column" <?php echo !(isset($_SESSION["role"]) && $_SESSION["role"] == "ADMIN")  ? "style='display:none;'" : ""; ?>>
                                        <a href="admin_utilisateurs.php">UTILISATEURS</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


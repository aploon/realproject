<?php require_once(__DIR__ . '/db.php') ?>
<?php require_once(__DIR__ . '/fonctions.php') ?>
<?php require_once(__DIR__ . '/fonctions-sql.php') ?>
<?php
if (connected()) {
    header("location:/realproject");
    exit();
}

?>
<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bakix - Crowdfunding Startup Fundraising HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.png in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body>

    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->

    <!-- header start -->
    <?php require_once(__DIR__ . '/include/header.php') ?>
    <!-- header end -->
    <main>
        <!-- page-title-area start -->
        <section class="page-title-area pt-320 pb-140" data-background="assets/img/slider/slider-bg-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title page-title-white text-center">
                            <h2>Inscription</h2>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li><a href="/realproject">Accueil</a></li>
                                    <li><a href="/realproject/projets">Projets</a></li>
                                    <li>Inscription</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-title-area end -->

        <!-- login Area Strat-->
        <div class="login-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">

                        <div class="basic-login form_signup">
                            <h3 class="text-center mb-60">Inscrivez vous ici</h3>
                            <form id="form_signup">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="sexe">Civilité </label>
                                        <select id="sexe" name="sexe" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="Masculin">Mr</option>
                                            <option value="Féminin">Mme</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nom">Nom de famille <span>**</span></label>
                                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Votre nom" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="prenom">Prénom <span>**</span></label>
                                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Votre prénom" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="prenom">Date de naissance </label>
                                        <input type="date" name="date" class="form-control" id="date">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="prenom">Ville </label>
                                        <input type="text" name="ville" class="form-control" id="ville" placeholder="Votre ville de résidence">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="adresse">Address</label>
                                        <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Cotonou/Gbénounpko carrée 162">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tel">Téléphone <span>**</span></label>
                                        <input type="number" name="tel" class="form-control" id="tel" placeholder="Numéro de téléphone">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email <span>**</span></label>
                                        <span class="d-none" id="email_message" style="color: red;"></span>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Votre adresse mail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="userName">Nom d'utilisateur <span>**</span></label>
                                    <input type="text" name="userName" class="form-control" id="userName" placeholder="Nom d'utilisateur">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Mot de passe <span>**</span></label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Entrer votre mot de passe">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="confirmPassword">Confirmez mot de passe <span>**</span></label>
                                        <span class="d-none" id="confirmPassword_message" style="color: red;"></span>
                                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirmez le mot de passe">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role">Je suis ! </label>
                                    <select id="role" name="role" class="form-control">
                                        <option value="promoteur">Promoteur (Soumettre des projets pour obtenir un financement)</option>
                                        <option value="contributeur">Contributeur (Soutenir des projets en faisant des dons ou des prêts)</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-black w-100">S'inscrire</button>
                                <div class="or-divide"><span>ou</span></div>
                                <a href="login.php" class="btn w-100">Connectez-vous</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login Area End-->

        <!-- brand-area start -->
        <section class="brand-area pt-110 pb-120" data-background="assets/img/bg/footer.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="brand-heading text-center mb-80">
                            <h3>Sponsore officiel de realproject</h3>
                        </div>
                        <div class="brand-active owl-carousel">
                            <div class="single-brand">
                                <img src="assets/img/brand/brand1.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="assets/img/brand/brand2.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="assets/img/brand/brand3.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="assets/img/brand/brand4.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="assets/img/brand/brand5.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="assets/img/brand/brand6.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="assets/img/brand/brand2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- brand-area end -->

    </main>

    <!-- footer start -->
    <?php require_once(__DIR__ . '/include/footer.php') ?>
    <!-- footer end -->





    <!-- JS here -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/one-page-nav-min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        $(document).on('submit', '#form_signup', function(event) {
            event.preventDefault();

            var form_data = $(this).serialize();
            $.ajax({
                url: 'scripts-php/signup-action.php',
                method: 'POST',
                data: form_data,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data == 'Email existant') {
                        $('#email_message').addClass('d-block').removeClass('d-none');
                        $('#email_message').text('L\'email que vous avez entrer à déja un compte');
                    } else {
                        $('#email_message').addClass('d-none').removeClass('d-block');
                    }

                    if (data == 'Donnée insérer') {
                        window.location = "/realproject/pages/confirm_signup";
                    }

                    if (data == 'Erreur de confirmation de mot de passe') {
                        $('#confirmPassword_message').addClass('d-block').removeClass('d-none');
                        $('#confirmPassword_message').text('Erreur de confirmation de mot de passe');
                    } else {
                        $('#confirmPassword_message').addClass('d-none').removeClass('d-block');
                    }

                }
            });


        });
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>



</html>
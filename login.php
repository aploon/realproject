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
<html class="no-js" lang="en">
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
    <?php require_once(__DIR__.'/include/header.php') ?>
    <!-- header end -->
    <main>
        <!-- page-title-area start -->
        <section class="page-title-area pt-320 pb-140" data-background="assets/img/slider/slider-bg-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title page-title-white text-center">
                            <h2>Connexion</h2>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li><a href="/realproject">Accueil</a></li>
                                    <li><a href="/realproject/projets">Projets</a></li>
                                    <li>Connexion</li>
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
                        <div class="basic-login">
                            <h3 class="text-center mb-60">Connectez vous ici</h3>
                            <form id="form_login">
                                <label for="email">Adresse email <span>**</span></label>
                                <input id="email" name="email" type="text" placeholder="Entrer votre email" />
                                <label for="password">Mot de passe <span>**</span></label>
                                <input id="password" name="password" type="password" placeholder="Entrer votre mot de passe" />
                                <div class="login-action mb-20 fix">
                                    <span class="log-rem f-left">
                                        <input id="remember" type="checkbox" />
                                        <label for="remember">Remember me!</label>
                                    </span>
                                    <span class="forgot-login f-right">
                                        <a href="#">Mot de passe oublié ?</a>
                                    </span>
                                </div>
                                <button class="btn btn-black w-100">Se connecter</button>
                                <div class="or-divide"><span>ou</span></div>
                                <a href="signup.php" class="btn w-100">Inscrivez-vous</a>
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
    <?php require_once(__DIR__.'/include/footer.php') ?>
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
        $(document).ready(function() {

            $(document).on('submit', '#form_login', function(event) {
                event.preventDefault();

                var form_data = $(this).serialize();
                $.ajax({
                    url: 'scripts-php/login-action.php',
                    method: 'POST',
                    data: form_data,
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);


                        if (data == "Paramètres corrects - Lecteur") {
                            window.location = "/realproject";
                        }

                        if (data == "Paramètres corrects - Editeur") {
                            window.location = "/realproject";
                        }
                        if (data == "Paramètres corrects - Admin") {
                            window.location = "/realproject";
                        }

                        if (data == "Paramètres corrects - SuperAdmin") {
                            window.location = "/realproject";
                        }

                        if (data == "Email invalide") {
                            swal.fire('Erreur de connexion', 'Email incorrect', 'error');
                        }

                        if (data == "Mot de passe erroné") {
                            swal.fire('Erreur de connexion', 'Mot de passe incorrect', 'error');
                        }

                        if (data == "Compte désactivé") {
                            swal.fire('Erreur de connexion', 'Compte désactivé', 'error');
                        }
                        if (data == "Erreur de connection") {
                            swal.fire('Erreur de connexion', 'Vous n\'êtes pas autorité à vous connecter', 'error');
                        }
                    }
                });


            });

        });
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>



</html>
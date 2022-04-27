<?php require_once(__DIR__ . '/../../db.php') ?>
<?php require_once(__DIR__ . '/../../fonctions.php') ?>
<?php require_once(__DIR__ . '/../../fonctions-sql.php') ?>
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
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.png">
    <!-- Place favicon.png in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/animate.min.css">
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/css/flaticon.css">
    <link rel="stylesheet" href="../../assets/css/meanmenu.css">
    <link rel="stylesheet" href="../../assets/css/slick.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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
    <header id="sticky-header" class="header header-transparent mt-60" style="box-shadow: 0 10px 15px rgb(25 25 25 / 10%);">
        <div class="container">
            <div class="header-box white-bg pl-50 pr-50">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-5 d-flex align-items-center">
                        <div class="header__logo">
                            <a href="/realproject"><img src="../../assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-7 col-md-9">
                        <div class="header__right f-right">
                            <div class="header__icon f-right mt-30">
                                <a class="login-btn" href="login.php"><i class="fas fa-lock"></i></a>
                            </div>
                            <div class="header__icon f-right mt-30 ml-30 d-none d-md-block">
                                <a class="btn" href="../../projets/soumission/">Soumettre projet</a>
                            </div>
                        </div>
                        <div class="header__menu f-right">
                            <nav id="mobile-menu">
                                <ul>
                                    <li><a href="/realproject">Accueil</a>

                                    </li>


                                    <li><a href="progress.html">Explorer</a>
                                        <ul class="submenu">






                                            <li><a href="login.php">Projets en financement</a></li>
                                            <li><a href="register.html">Projets Finalisés</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="progress.html">Financer</a>
                                        <ul class="submenu">
                                            <li><a href="shop.html">Agriculture</a></li>
                                            <li><a href="category.html">Immobilier</a></li>
                                            <li><a href="product-details.html">Santé</a></li>
                                            <li><a href="cart.html">Education</a></li>
                                            <li><a href="checkout.html">Technologie</a></li>



                                        </ul>
                                    </li>
                                    <li><a href="blog.html">À propos</a>

                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
    <main>

        <section>
            <div class="container pt-250 pb-140">
                <div class="col-xs-12 text-center">
                    <i class="bi bi-cloud-check text-success" style="font-size: 100px;"></i>
                    <br>
                    <h2>Inscription réussir</h2>
                    <h2>Activez votre compte</h2>
                    <p style="font-size: 17px;"><strong>Vous avez reçu un email d'activation.</strong> Vérifiez le dossier "Spam / Courrier indésirable".</p>
                    <p style="font-size: 17px;">Cliquez sur le lien pour activer votre compte.</p>
                </div>
                <div class="">
                    <a href="/realproject/login.php" class="btn-border"><i class="bi bi-arrow-left" style="font-size: 15px;"></i> Se connecter</a>
                </div>
            </div>
        </section>


    </main>

    <!-- footer start -->
    <?php require_once(__DIR__.'/../../include/footer.php') ?>
    <!-- footer end -->





    <!-- JS here -->
    <script src="../../assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/owl.carousel.min.js"></script>
    <script src="../../assets/js/isotope.pkgd.min.js"></script>
    <script src="../../assets/js/one-page-nav-min.js"></script>
    <script src="../../assets/js/slick.min.js"></script>
    <script src="../../assets/js/jquery.meanmenu.min.js"></script>
    <script src="../../assets/js/ajax-form.js"></script>
    <script src="../../assets/js/wow.min.js"></script>
    <script src="../../assets/js/jquery.scrollUp.min.js"></script>
    <script src="../../assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="../../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../../assets/js/plugins.js"></script>
    <script src="../../assets/js/main.js"></script>

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
                    }
                });


            });

        });
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>



</html>
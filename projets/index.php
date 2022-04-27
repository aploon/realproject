<?php require_once(__DIR__ . '/../db.php') ?>
<?php require_once(__DIR__ . '/../fonctions.php') ?>
<?php require_once(__DIR__ . '/../fonctions-sql.php') ?>

<?php
    
$etat_projet = "'en_cour' OR 'en_attente'";

$query = "SELECT * FROM projet, promoteur, personne, secteur WHERE projet.id_promoteur_fk_projet = promoteur.id_promoteur AND promoteur.id_personne_fk_promoteur = personne.id_personne AND projet.id_secteur_fk_projet = secteur.id_secteur AND etat_projet = 'en_cour' OR 'en_attente'";
$statement = $db->prepare($query);
$statement->bindParam(':etat_projet', $etat_projet);
$statement->execute();

$result = $statement->fetchAll();

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
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">
    <!-- Place favicon.png in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="../assets/css/meanmenu.css">
    <link rel="stylesheet" href="../assets/css/slick.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">

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
    <?php require_once(__DIR__.'/../include/header.php') ?>
    <!-- header end -->
    <main>
        <!-- page-title-area start -->
        <section class="page-title-area pt-320 pb-140" data-background="../assets/img/slider/slider-bg-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title page-title-white text-center">
                            <h2>Projets</h2>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li><a href="/realproject">Accueil</a></li>
                                    <li>Projets</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-title-area end -->

        <!-----------------///////////////////////////////////////////////////////////////------------------------>
        <!-- causes-area start -->
        <section class="causes-area grey-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-60">
                            <p><span></span>Tous les projets</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $compteRow = 0; ?>
                    <?php foreach ($result as $row) : ?>
                        <?php if ($compteRow < 100) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="causes white-bg mb-30">
                                    <div class="causes__img">
                                        <img src="../assets/img/causes/imgCover/<?= $row['img_cover_projet'] ?>" alt="">
                                        <div class="causes-heart">
                                            <a href="#"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="causes__caption">
                                        <div class="causes-tag mb-20">
                                            <!-- Nom secteur-->
                                        </div>
                                        <h4><a href="/realproject/projets/consultation/?Kennung=<?= $row['id_projet'] ?>"><?= $row['nom_projet'] ?>: Mexico City art
                                                guide & living archive.</a></h4>
                                        <div class="causes-progress mb-25">
                                            <?php
                                            $percent = ($row['montant_collecte_projet'] / $row['montant_total_projet']) * 100;
                                            ?>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: <?= $percent ?>%;" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="causes-count mt-15 fix">
                                                <?php if ($row['etat_projet'] == 'finalise') : ?>
                                                    <div class="awart-icon">
                                                        <img src="/realproject/assets/img/icon/award.png" alt="">
                                                    </div>
                                                <?php endif ?>
                                                <div class="count-number f-left text-left">
                                                    <h2>$<?= $row['montant_collecte_projet'] ?></h2>
                                                    <span>Collecté</span>
                                                </div>
                                                <div class="count-number f-right text-right">
                                                    <h2>$<?= $row['montant_total_projet'] ?></h2>
                                                    <span>Objectif</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="causes-meta fix">
                                            <span class="f-left">by <a href="#"><?= $row['nom_personne'] . ' ' . $row['prenom_personne'] ?></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php $compteRow++ ?>
                    <?php endforeach ?>
                </div>
            </div>
        </section>

        <!-- brand-area start -->
        <section class="brand-area pt-110 pb-120" data-background="../assets/img/bg/footer.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="brand-heading text-center mb-80">
                            <h3>What Client Working With BAKIX And They Are Happy</h3>
                        </div>
                        <div class="brand-active owl-carousel">
                            <div class="single-brand">
                                <img src="../assets/img/brand/brand1.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../assets/img/brand/brand2.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../assets/img/brand/brand3.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../assets/img/brand/brand4.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../assets/img/brand/brand5.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../assets/img/brand/brand6.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../assets/img/brand/brand2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- brand-area end -->

    </main>

    <!-- footer start -->
    <?php require_once(__DIR__.'/../include/footer.php') ?>
    <!-- footer end -->




    <!-- JS here -->
    <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/isotope.pkgd.min.js"></script>
    <script src="../assets/js/one-page-nav-min.js"></script>
    <script src="../assets/js/slick.min.js"></script>
    <script src="../assets/js/jquery.meanmenu.min.js"></script>
    <script src="../assets/js/ajax-form.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/jquery.scrollUp.min.js"></script>
    <script src="../assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJScy7qJ156DWM8kJVG-ZrK0R7Kize2Jg"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
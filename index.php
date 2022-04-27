<?php require_once(__DIR__ . '/db.php') ?>
<?php require_once(__DIR__ . '/fonctions.php') ?>
<?php require_once(__DIR__ . '/fonctions-sql.php') ?>
<?php

$query = "SELECT * FROM projet, promoteur, personne, secteur WHERE projet.id_promoteur_fk_projet = promoteur.id_promoteur AND promoteur.id_personne_fk_promoteur = personne.id_personne AND projet.id_secteur_fk_projet = secteur.id_secteur AND etat_projet = 'en_cour' ORDER BY id_projet ASC";
$statement = $db->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

$query1 = "SELECT * FROM secteur";
$statement1 = $db->prepare($query1);
$statement1->execute();

$result1 = $statement1->fetchAll();


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

    <header id="sticky-header" class="header header-transparent header-2-style pt-40">
        <div class="container-fluid">
            <div class="header-box header-no-bg pl-65 pr-65">
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-6 d-flex align-items-center">
                        <div class="header__logo">
                            <a href="/realproject"><img src="assets/img/logo/logo-white.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-6 col-md-9">
                        <div class="header__menu f-left">
                            <nav id="mobile-menu" style="display: block;">
                                <ul>
                                    <li><a href="/realproject">Accueil</a>

                                    </li>


                                    <li><a href="/realproject/projets">Projets</a>
                                        <ul class="submenu">
                                            <li><a href="/realproject/projets/en-financement">Projets en financement</a></li>
                                            <li><a href="/realproject/projets/finalise">Projets Finalisés</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="/realproject/projets/secteurs">Secteurs</a>
                                        <ul class="submenu">
                                            <?php
                                            $queryH = "SELECT nom_secteur FROM secteur";
                                            $statementH = $db->prepare($queryH);
                                            $statementH->execute();
                                            $resultH = $statementH->fetchAll();
                                            $compteRowH = 0;
                                            ?>
                                            <?php foreach ($resultH as $row) : ?>
                                                <?php if ($compteRowH < 5) : ?>
                                                    <li><a href="/realproject/projets/secteurs/?Bereich=<?= $row['nom_secteur'] ?>"><?= $row['nom_secteur'] ?></a></li>
                                                <?php endif ?>
                                                <?php $compteRowH++ ?>
                                            <?php endforeach ?>
                                        </ul>
                                    </li>
                                    <li><a href="/realproject/pages/a-propos/">À propos</a></li>
                                    <li><a href="/realproject/pages/contact/">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header__right f-right">
                            <div class="header__icon f-right mt-30">
                                <a class="login-btn" href="<?= si_funct1(connected(), '/realproject/pages/profile/', '/realproject/login.php') ?>">
                                    <?php if (connected()) : ?>
                                        <span style="font-size: 17px;">
                                            <?= strtoupper(substr($_SESSION['nom_personne'], 0, 1)) ?>
                                        </span>
                                    <?php else : ?>
                                        <i class="fas fa-lock"></i>
                                    <?php endif ?>
                                </a>
                            </div>
                            <div class="header__icon f-right mt-30 ml-30 d-none d-xl-block">
                                <a class="btn" href="/realproject/projets/<?= si_funct(user_type(), 'contributeur', 'en-financement', 'soumission')?>/"><?= si_funct(user_type(), 'contributeur', 'Financer un projet', 'Soumettre projet')?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- hero-area start -->
        <section class="hero-area ">
            <div class="hero-slider-area" data-background="assets/img/slider/slider-bg-2.jpg">
                <div class="slider-active">
                    <?php
                    $query3 = "SELECT * FROM projet, promoteur, personne, secteur WHERE projet.id_promoteur_fk_projet = promoteur.id_promoteur AND promoteur.id_personne_fk_promoteur = personne.id_personne AND projet.id_secteur_fk_projet = secteur.id_secteur AND etat_projet = 'en_cour' AND cover_site_projet = 'oui' ORDER BY img_cover_site_projet ASC";
                    $statement3 = $db->prepare($query3);
                    $statement3->execute();

                    $result3 = $statement3->fetchAll();
                    ?>
                    <?php foreach ($result3 as $row) : ?>
                        <div class="single-slider pt-360">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-7 col-lg-10">
                                        <div class="hero hero-slider">
                                            <div class="hero__caption">
                                                <p data-animation="fadeInLeft" data-delay=".2s">Vos rêves deviennent réalité</p>
                                                <h1 data-animation="fadeInLeft" data-delay=".4s"><?= $row['nom_secteur'] ?> : <?= $row['nom_projet'] ?> </h1>
                                            </div>
                                            <div class="hero-progress">
                                                <?php
                                                $percent = ($row['montant_collecte_projet'] / $row['montant_total_projet']) * 100;
                                                ?>
                                                <div class="progress" data-animation="fadeInUp" data-delay=".6s">
                                                    <div class="progress-bar" style="width: <?= $percent ?>%;" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="payment-count mt-20 fix">
                                                    <div class="count f-left text-left" data-animation="fadeInUp" data-delay=".8s">
                                                        <h2>$<?= $row['montant_collecte_projet'] ?></h2>
                                                        <span>Collecté</span>
                                                    </div>
                                                    <div class="count f-right text-right" data-animation="fadeInUp" data-delay="1s">
                                                        <h2>$<?= $row['montant_total_projet'] ?></h2>
                                                        <span>Objectif</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 d-none d-xl-block">
                                        <div class="slide-img" data-animation="fadeInRight" data-delay="1.2s">
                                            <img src="assets/img/<?= $row['img_cover_site_projet'] ?>" alt="" style="max-width: 550px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <!-- <div class="single-slider pt-360">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-10">
                                    <div class="hero hero-slider">
                                        <div class="hero__caption">
                                            <p data-animation="fadeInLeft" data-delay=".2s">Vos rêves deviennent réalité</p>
                                            <h1 data-animation="fadeInLeft" data-delay=".4s">IT : Sensor Control Laptop </h1>
                                        </div>
                                        <div class="hero-progress">
                                            <div class="progress" data-animation="fadeInUp" data-delay=".6s">
                                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="payment-count mt-20 fix">
                                                <div class="count f-left text-left" data-animation="fadeInUp" data-delay=".8s">
                                                    <h2>$32,678</h2>
                                                    <span>Collecté</span>
                                                </div>
                                                <div class="count f-right text-right" data-animation="fadeInUp" data-delay="1s">
                                                    <h2>$33,467</h2>
                                                    <span>Objectif</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 d-none d-xl-block">
                                    <div class="slide-img" data-animation="fadeInRight" data-delay="1.2s">
                                        <img src="assets/img/cover1.png" alt="" style="max-width: 550px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider pt-360">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-10">
                                    <div class="hero hero-slider">
                                        <div class="hero__caption">
                                            <p data-animation="fadeInLeft" data-delay=".2s">Vos rêves deviennent réalité</p>
                                            <h1 data-animation="fadeInLeft" data-delay=".4s">IT : Virtual Reality Console</h1>
                                        </div>
                                        <div class="hero-progress">
                                            <div class="progress" data-animation="fadeInUp" data-delay=".6s">
                                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="payment-count mt-20 fix">
                                                <div class="count f-left text-left" data-animation="fadeInUp" data-delay=".8s">
                                                    <h2>$32,678</h2>
                                                    <span>Collecté</span>
                                                </div>
                                                <div class="count f-right text-right" data-animation="fadeInUp" data-delay="1s">
                                                    <h2>$33,467</h2>
                                                    <span>Objectif</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 d-none d-xl-block">
                                    <div class="slide-img" data-animation="fadeInRight" data-delay="1.2s">
                                        <img src="assets/img/cover2.png" alt="" style="max-width: 550px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider pt-360">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-10">
                                    <div class="hero hero-slider">
                                        <div class="hero__caption">
                                            <p data-animation="fadeInLeft" data-delay=".2s">Vos rêves deviennent réalité</p>
                                            <h1 data-animation="fadeInLeft" data-delay=".4s">Santé <br> Herbal-Medina</h1>
                                        </div>
                                        <div class="hero-progress">
                                            <div class="progress" data-animation="fadeInUp" data-delay=".6s">
                                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="payment-count mt-20 fix">
                                                <div class="count f-left text-left" data-animation="fadeInUp" data-delay=".8s">
                                                    <h2>$32,678</h2>
                                                    <span>Collecté</span>
                                                </div>
                                                <div class="count f-right text-right" data-animation="fadeInUp" data-delay="1s">
                                                    <h2>$33,467</h2>
                                                    <span>Objectif</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 d-none d-xl-block">
                                    <div class="slide-img" data-animation="fadeInRight" data-delay="1.2s">
                                        <img src="assets/img/cover.png" alt="" style="max-width: 550px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="container">
                    <div class="feasures-border pt-35 pb-90">
                        <div class="row">
                            <?php foreach ($result3 as $row) : ?>
                                <div class="col-xl-4 col-lg-4">
                                    <div class="popular-features mb-30">
                                        <div class="hero__caption">
                                            <h4><a href="/realproject/projets/consultation/?Kennung=<?= $row['id_projet'] ?>"><?= $row['nom_projet'] ?>: Mexico City art
                                                    guide & living archive.</a></h4>
                                        </div>
                                        <div class="hero-progress">
                                            <?php
                                            $percent = ($row['montant_collecte_projet'] / $row['montant_total_projet']) * 100;
                                            ?>
                                            <div class="progress">
                                                <div class="progress-bar theme-bg" style="width: <?= $percent ?>%;" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <!-- <div class="col-xl-4 col-lg-4">
                                <div class="popular-features mb-30">
                                    <div class="hero__caption">
                                        <h4><a href="#">Onda MX App: Mexico City art
                                                guide & living archive.</a></h4>
                                    </div>
                                    <div class="hero-progress">
                                        <div class="progress">
                                            <div class="progress-bar theme-bg w-75" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="popular-features mb-30">
                                    <div class="hero__caption">
                                        <h4><a href="#">Onda MX App: Mexico City art
                                                guide & living archive.</a></h4>
                                    </div>
                                    <div class="hero-progress">
                                        <div class="progress">
                                            <div class="progress-bar w-75" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="popular-features mb-30">
                                    <div class="hero__caption">
                                        <h4><a href="#">Onda MX App: Mexico City art
                                                guide & living archive.</a></h4>
                                    </div>
                                    <div class="hero-progress">
                                        <div class="progress">
                                            <div class="progress-bar theme-red w-75" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero-area end -->

        <!-- features-area start -->
        <section class="features-area pt-120 pb-80">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="section-title mb-65">
                            <p><span></span> Nos objectifs</p>
                            <h1>Nous facilitons l'investissement</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="features text-center mb-40">
                            <div class="features__icon mb-50">
                                <img src="assets/img/features/icon1.png" alt="">
                            </div>
                            <div class="features__caption">
                                <h2>Obtenir un financement</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="features text-center mb-40">
                            <div class="features__icon mb-50">
                                <img src="assets/img/features/icon2.png" alt="">
                            </div>
                            <div class="features__caption">
                                <h2>Sécurité garantie</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="features text-center mb-40">
                            <div class="features__icon mb-50">
                                <img src="assets/img/features/icon3.png" alt="">
                            </div>
                            <div class="features__caption">
                                <h2>Amasser plus de fond</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- features-area end -->

        <!-- causes-area start -->
        <section class="causes-area grey-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-60">
                            <p><span></span> Projets populaires</p>
                            <h1>Contribuer avant l'expiration du délai</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $compteRow = 0; ?>
                    <?php foreach ($result as $row) : ?>
                        <?php if ($compteRow < 6) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="causes white-bg mb-30">
                                    <div class="causes__img">
                                        <img src="assets/img/causes/imgCover/<?= $row['img_cover_projet'] ?>" alt="">
                                        <div class="causes-heart">
                                            <a href="#"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="causes__caption">
                                        <div class="causes-tag mb-20">
                                            <a href="#"><?= $row['nom_secteur'] ?></a>
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
                <div class="row mt-30">
                    <div class="col-xl-12">
                        <div class="section-link text-center">
                            <a class="btn-border" href="#">Plus de projets</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- causes-area end -->

        <!-- how-works-area start -->
        <section class="how-works-area pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-lg-9">
                        <div class="section-title mb-55">
                            <p><span></span>Comment ça fonctionne</p>
                            <h1>Nous facilitons les choses</h1>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 d-none d-xl-block">
                        <div class="section-link mb-80 text-right">
                            <a class="btn-border btn-theme popup-video" href="https://www.youtube.com/watch?v=JyVTkgOrGGU"><i class="fas fa-play"></i> Découvrir</a>
                        </div>
                    </div>
                </div>
                <div class="row process-pareent">
                    <div class="col-xl-4 col-lg-4">
                        <div class="work-process text-center">
                            <div class="process-no mb-20">
                                <span class="border-line">01</span>
                            </div>
                            <div class="process-content">
                                <h3>Inscrivez-vous avec votre véritable identité</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="work-process text-center">
                            <div class="process-no mb-20">
                                <span class="border-line">02</span>
                            </div>
                            <div class="process-content">
                                <h3>Donnez des détails avec une idée innovante</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="work-process text-center">
                            <div class="process-no mb-20">
                                <span>03</span>
                            </div>
                            <div class="process-content">
                                <h3>& Obtenez enfin des contributeurs géniaux</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- how-works-area end -->

        <!-- causes-area start -->
        <section class="causes-area grey-bg pt-120 pb-90">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-lg-9">
                        <div class="section-title mb-65">
                            <p><span></span> Plus de projets</p>
                            <h1>Vos rêves deviennent réalité</h1>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 d-none d-xl-block">
                        <div class="section-link mb-65 text-right">
                            <a class="btn-border" href="#">Autres projets</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="causes-tab">

                            <ul class="nav theme-bg text-center mb-75" id="myTab" role="tablist">
                                <?php $compteRow = 0; ?>
                                <?php foreach ($result1 as $row) : ?>
                                    <?php if ($compteRow < 5) : ?>
                                        <?php if ($compteRow == 0) : ?>
                                            <li class="nav-item">
                                                <a class="nav-link active" id="secteur-tab" data-toggle="tab" href="#secteur" role="tab" aria-controls="secteur" aria-selected="true"><?= $row['nom_secteur'] ?></a>
                                            </li>
                                        <?php else : ?>
                                            <li class="nav-item">
                                                <a class="nav-link" id="secteur<?= $compteRow ?>-tab" data-toggle="tab" href="#secteur<?= $compteRow ?>" role="tab" aria-controls="secteur" aria-selected="false"><?= $row['nom_secteur'] ?></a>
                                            </li>
                                        <?php endif ?>
                                    <?php endif ?>
                                    <?php $compteRow++ ?>
                                <?php endforeach ?>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <?php $compteRow = 0; ?>
                                <?php foreach ($result1 as $row) : ?>
                                    <?php if ($compteRow < 5) : ?>
                                        <?php if ($compteRow == 0) : ?>
                                            <div class="tab-pane fade show active" id="secteur" role="tabpanel" aria-labelledby="secteur-tab">
                                                <div class="row">
                                                    <?php
                                                    $firstSecteur = $row['nom_secteur'];
                                                    $query2 = "SELECT * FROM projet, promoteur, personne, secteur WHERE projet.id_promoteur_fk_projet = promoteur.id_promoteur AND promoteur.id_personne_fk_promoteur = personne.id_personne AND projet.id_secteur_fk_projet = secteur.id_secteur AND (etat_projet = 'en_cour' OR etat_projet = 'finalise') AND nom_secteur = '$firstSecteur' ORDER BY etat_projet DESC";
                                                    $statement2 = $db->prepare($query2);
                                                    $statement2->execute();

                                                    $result2 = $statement2->fetchAll();
                                                    ?>
                                                    <?php $compteRow1 = 0; ?>
                                                    <?php foreach ($result2 as $row) : ?>
                                                        <?php if ($compteRow1 < 3) : ?>
                                                            <div class="col-xl-4 col-lg-4 col-md-6">
                                                                <div class="causes white-bg mb-30">
                                                                    <div class="causes__img">
                                                                        <img src="assets/img/causes/imgCover/<?= $row['img_cover_projet'] ?>" alt="">
                                                                        <div class="causes-heart">
                                                                            <a href="#"><i class="far fa-heart"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="causes__caption">
                                                                        <div class="causes-tag mb-20">
                                                                            <a href="#"><?= $row['nom_secteur'] ?></a>
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
                                                                                        <img src="assets/img/icon/award.png" alt="">
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
                                                        <?php $compteRow1++ ?>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="tab-pane fade" id="secteur<?= $compteRow ?>" role="tabpanel" aria-labelledby="secteur<?= $compteRow ?>-tab">
                                                <div class="row">
                                                    <?php
                                                    $otherSecteur = $row['nom_secteur'];
                                                    $query2 = "SELECT * FROM projet, promoteur, personne, secteur WHERE projet.id_promoteur_fk_projet = promoteur.id_promoteur AND promoteur.id_personne_fk_promoteur = personne.id_personne AND projet.id_secteur_fk_projet = secteur.id_secteur AND (etat_projet = 'en_cour' OR etat_projet = 'finalise') AND nom_secteur = '$otherSecteur' ORDER BY etat_projet DESC";
                                                    $statement2 = $db->prepare($query2);
                                                    $statement2->execute();

                                                    $result2 = $statement2->fetchAll();
                                                    ?>
                                                    <?php $compteRow2 = 0; ?>
                                                    <?php foreach ($result2 as $row) : ?>
                                                        <?php if ($compteRow2 < 3) : ?>
                                                            <div class="col-xl-4 col-lg-4 col-md-6">
                                                                <div class="causes white-bg mb-30">
                                                                    <div class="causes__img">
                                                                        <img src="assets/img/causes/imgCover/<?= $row['img_cover_projet'] ?>" alt="">
                                                                        <div class="causes-heart">
                                                                            <a href="#"><i class="far fa-heart"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="causes__caption">
                                                                        <div class="causes-tag mb-20">
                                                                            <a href="#"><?= $row['nom_secteur'] ?></a>
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
                                                                                        <img src="assets/img/icon/award.png" alt="">
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
                                                        <?php $compteRow2++ ?>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    <?php endif ?>
                                    <?php $compteRow++ ?>
                                <?php endforeach ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- causes-area end -->

        <!-- event-area start -->
        <section class="event-area pos-relative event-bg pt-120 pb-120">
            <div class="event-shape spahe1 bounce-animate" data-depth=".3"><img src="assets/img/event/p1.png" alt=""></div>
            <div class="event-shape spahe2 bounce-animate" data-depth=".3"><img src="assets/img/event/p2.png" alt=""></div>
            <div class="event-shape spahe3 bounce-animate" data-depth=".3"><img src="assets/img/event/p3.png" alt=""></div>
            <div class="event-shape spahe4 bounce-animate" data-depth=".3"><img src="assets/img/event/p4.png" alt=""></div>
            <div class="event-shape spahe5 bounce-animate" data-depth=".3"><img src="assets/img/event/p5.png" alt=""></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="section-title white-text mb-65">
                            <p><span></span> ÉVÉNEMENTS </p>
                            <h1>À venir</h1>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 d-none d-xl-block">
                        <div class="section-link mb-65 text-right">
                            <a class="btn-border btn-soft" href="#">more events</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="basic-tab">
                            <ul class="nav tab-menu justify-content-center mb-50" id="eventTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tabe" data-toggle="tab" href="#homee" role="tab" aria-controls="home" aria-selected="true">day 01</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tabe" data-toggle="tab" href="#profilee" role="tab" aria-controls="profile" aria-selected="false">day 02</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tabe" data-toggle="tab" href="#contacte" role="tab" aria-controls="contact" aria-selected="false">day 03</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="emyTabContent">
                                <div class="tab-pane fade " id="homee" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="event-wrapper mb-40">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <div class="event-time">
                                                    <div class="event-icon mb-20">
                                                        <img src="assets/img/event/icon/event-icon1.png" alt="">
                                                    </div>
                                                    <div class="event-time-text">
                                                        <h4>9.30 - 10.30 AM</h4>
                                                        <span>Start program</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center ">
                                                <div class="event-info">
                                                    <h3><a href="#">Fundrising Base Communation</a></h3>
                                                    <div class="event-meta mb-15">
                                                        <span>Speaker: Legend D. Jank,</span>
                                                        <span>Vanue: New York, USA</span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end">
                                                <div class="event-btn">
                                                    <a href="#" class="btn-circle">join today</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-wrapper mb-40">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <div class="event-time">
                                                    <div class="event-icon mb-20">
                                                        <img src="assets/img/event/icon/event-icon2.png" alt="">
                                                    </div>
                                                    <div class="event-time-text">
                                                        <h4>10.30 - 1.30 PM</h4>
                                                        <span>Communication</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center ">
                                                <div class="event-info">
                                                    <h3><a href="#">How Create A Global Connection</a></h3>
                                                    <div class="event-meta mb-15">
                                                        <span>Speaker: Legend D. Jank,</span>
                                                        <span>Vanue: New York, USA</span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end">
                                                <div class="event-btn">
                                                    <a href="#" class="btn-circle">join today</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-wrapper mb-40">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <div class="event-time">
                                                    <div class="event-icon mb-20">
                                                        <img src="assets/img/event/icon/event-icon3.png" alt="">
                                                    </div>
                                                    <div class="event-time-text">
                                                        <h4>2.30 - 10.30 AM</h4>
                                                        <span>Launch break</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center ">
                                                <div class="event-info">
                                                    <h3><a href="#">Launch Break</a></h3>
                                                    <div class="event-meta mb-15">
                                                        <span>Speaker: <span>Legend D. Jank, Romada Food</span></span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end">
                                                <div class="event-btn pr-50">
                                                    <img src="assets/img/event/icon/lunch.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-wrapper mb-40">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <div class="event-time">
                                                    <div class="event-icon mb-20">
                                                        <img src="assets/img/event/icon/event-icon4.png" alt="">
                                                    </div>
                                                    <div class="event-time-text">
                                                        <h4>4.30 - 10.30 PM</h4>
                                                        <span>Development</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center ">
                                                <div class="event-info">
                                                    <h3><a href="#">UX Research & Development</a></h3>
                                                    <div class="event-meta mb-15">
                                                        <span>Speaker: Legend D. Jank,</span>
                                                        <span>Vanue: New York, USA</span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end">
                                                <div class="event-btn">
                                                    <a href="#" class="btn-circle">join today</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="profilee" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="event-wrapper mb-40">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <div class="event-time">
                                                    <div class="event-icon mb-20">
                                                        <img src="assets/img/event/icon/event-icon1.png" alt="">
                                                    </div>
                                                    <div class="event-time-text">
                                                        <h4>10.30 - 10.30 AM</h4>
                                                        <span>Start program</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center ">
                                                <div class="event-info">
                                                    <h3><a href="#">Fundrising Base Communation</a></h3>
                                                    <div class="event-meta mb-15">
                                                        <span>Speaker: Legend D. Jank,</span>
                                                        <span>Vanue: New York, USA</span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end">
                                                <div class="event-btn">
                                                    <a href="#" class="btn-circle">join today</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-wrapper mb-40">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <div class="event-time">
                                                    <div class="event-icon mb-20">
                                                        <img src="assets/img/event/icon/event-icon2.png" alt="">
                                                    </div>
                                                    <div class="event-time-text">
                                                        <h4>12.30 - 1.30 PM</h4>
                                                        <span>Communication</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center ">
                                                <div class="event-info">
                                                    <h3><a href="#">Most Money Raised Become.</a></h3>
                                                    <div class="event-meta mb-15">
                                                        <span>Speaker: Legend D. Jank,</span>
                                                        <span>Vanue: New York, USA</span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end">
                                                <div class="event-btn">
                                                    <a href="#" class="btn-circle">join today</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-wrapper mb-40">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <div class="event-time">
                                                    <div class="event-icon mb-20">
                                                        <img src="assets/img/event/icon/event-icon4.png" alt="">
                                                    </div>
                                                    <div class="event-time-text">
                                                        <h4>3.30 - 10.30 PM</h4>
                                                        <span>Development</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center ">
                                                <div class="event-info">
                                                    <h3><a href="#">UX Research & Development</a></h3>
                                                    <div class="event-meta mb-15">
                                                        <span>Speaker: Legend D. Jank,</span>
                                                        <span>Vanue: New York, USA</span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end">
                                                <div class="event-btn">
                                                    <a href="#" class="btn-circle">join today</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-wrapper mb-40">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <div class="event-time">
                                                    <div class="event-icon mb-20">
                                                        <img src="assets/img/event/icon/event-icon3.png" alt="">
                                                    </div>
                                                    <div class="event-time-text">
                                                        <h4>8.30 - 10.30 PM</h4>
                                                        <span>Launch break</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center ">
                                                <div class="event-info">
                                                    <h3><a href="#">Dinner Break</a></h3>
                                                    <div class="event-meta mb-15">
                                                        <span>Speaker: <span>Legend D. Jank, Romada Food</span></span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end">
                                                <div class="event-btn pr-50">
                                                    <img src="assets/img/event/icon/lunch.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contacte" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="event-wrapper mb-40">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <div class="event-time">
                                                    <div class="event-icon mb-20">
                                                        <img src="assets/img/event/icon/event-icon1.png" alt="">
                                                    </div>
                                                    <div class="event-time-text">
                                                        <h4>9.30 - 10.30 AM</h4>
                                                        <span>Start program</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center ">
                                                <div class="event-info">
                                                    <h3><a href="#">Fundrising Base Communation</a></h3>
                                                    <div class="event-meta mb-15">
                                                        <span>Speaker: Legend D. Jank,</span>
                                                        <span>Vanue: New York, USA</span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end">
                                                <div class="event-btn">
                                                    <a href="#" class="btn-circle">join today</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-wrapper mb-40">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <div class="event-time">
                                                    <div class="event-icon mb-20">
                                                        <img src="assets/img/event/icon/event-icon3.png" alt="">
                                                    </div>
                                                    <div class="event-time-text">
                                                        <h4>1.30 - 10.30 PM</h4>
                                                        <span>Launch break</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center ">
                                                <div class="event-info">
                                                    <h3><a href="#">Launch Break</a></h3>
                                                    <div class="event-meta mb-15">
                                                        <span>Speaker: <span>Legend D. Jank, Romada Food</span></span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end">
                                                <div class="event-btn pr-50">
                                                    <img src="assets/img/event/icon/lunch.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-wrapper mb-40">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <div class="event-time">
                                                    <div class="event-icon mb-20">
                                                        <img src="assets/img/event/icon/event-icon2.png" alt="">
                                                    </div>
                                                    <div class="event-time-text">
                                                        <h4>4.30 - 1.30 PM</h4>
                                                        <span>Communication</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center ">
                                                <div class="event-info">
                                                    <h3><a href="#">How Create A Global Connection</a></h3>
                                                    <div class="event-meta mb-15">
                                                        <span>Speaker: Legend D. Jank,</span>
                                                        <span>Vanue: New York, USA</span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end">
                                                <div class="event-btn">
                                                    <a href="#" class="btn-circle">join today</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-wrapper mb-40">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-center">
                                                <div class="event-time">
                                                    <div class="event-icon mb-20">
                                                        <img src="assets/img/event/icon/event-icon4.png" alt="">
                                                    </div>
                                                    <div class="event-time-text">
                                                        <h4>7.30 - 10.30 PM</h4>
                                                        <span>Development</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center ">
                                                <div class="event-info">
                                                    <h3><a href="#">UX Research & Development</a></h3>
                                                    <div class="event-meta mb-15">
                                                        <span>Speaker: Legend D. Jank,</span>
                                                        <span>Vanue: New York, USA</span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end">
                                                <div class="event-btn">
                                                    <a href="#" class="btn-circle">join today</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- event-area end -->

        <!-- news-area start -->
        <section class="news-area grey-bg pt-120 pb-90">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="section-title mb-65">
                            <p><span></span> Fil d'actualités</p>
                            <h1>Derniers articles de notre blog</h1>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 d-none d-xl-block">
                        <div class="section-link mb-65 text-right">
                            <a class="btn-border" href="#">Mise à jours</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="latest-news mb-30">
                            <div class="news__thumb-2">
                                <img src="assets/img/blog/col-3/blog1.jpg" alt="">
                            </div>
                            <div class="news__caption-2 white-bg">
                                <div class="news-meta mb-15">
                                    <span><a href="#">Salim Rana</a></span>
                                    <span>Jan 5, 2018</span>
                                </div>
                                <h2><a href="blog-details.html">Dorem ipsum dolor sit amet
                                        consectetur adilisicinl.</a></h2>
                                <p>Consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et lau dolore magna aliqua enim.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="latest-news mb-30">
                            <div class="news__thumb-2">
                                <img src="assets/img/blog/col-3/blog2.jpg" alt="">
                            </div>
                            <div class="news__caption-2 white-bg">
                                <div class="news-meta mb-15">
                                    <span><a href="#">Tabassum</a></span>
                                    <span>May 16, 2018</span>
                                </div>
                                <h2><a href="blog-details.html">But I must explain to you how all this mistaken .</a></h2>
                                <p>Consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et lau dolore magna aliqua enim.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="latest-news mb-30">
                            <div class="news__thumb-2">
                                <img src="assets/img/blog/col-3/blog3.jpg" alt="">
                            </div>
                            <div class="news__caption-2 white-bg">
                                <div class="news-meta mb-15">
                                    <span><a href="#">John Doe</a></span>
                                    <span>Feb 18, 2018</span>
                                </div>
                                <h2><a href="blog-details.html">On the other hand, we deno unce with righteous.</a></h2>
                                <p>Consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et lau dolore magna aliqua enim.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- news-area end -->

        <!-- newsletter-area start -->
        <section class="newsletter-area pos-relative event-bg pt-120 pb-120" data-background="assets/img/bg/letter.jpg">
            <div class="letter-shape letter-s1 bounce-animate"><img src="assets/img/icon/news1.png" alt=""></div>
            <div class="letter-shape letter-s2 bounce-animate"><img src="assets/img/icon/news2.png" alt=""></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-5">
                        <div class="section-title white-text">
                            <p><span></span> Nous sommes à vos cotés</p>
                            <h1>Abonnez-vous maintenant</h1>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <div class="subscribe-form subscribe-form-2">
                            <form action="#">
                                <input type="text" placeholder="Entrez votre adresse mail">
                                <button class="btn" type="submit">S'abonnez <img src="assets/img/icon/arrow.png" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- newsletter-area end -->
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
    <footer data-background="assets/img/bg/footer-bg.jpg">
        <div class="footer-area footer-bootm-border pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-info text-center">
                            <div class="footer-logo mb-45">
                                <img src="assets/img/logo/footer-logo.png" alt="">
                            </div>
                            <div class="social-icon-link mb-45">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                            <div class="right-text">
                                <p>Copyright By BasicTheme - 2019</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
    <script src="assets/js/instafeed.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
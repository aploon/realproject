<?php require_once(__DIR__ . '/../../db.php') ?>
<?php require_once(__DIR__ . '/../../fonctions.php') ?>
<?php require_once(__DIR__ . '/../../fonctions-sql.php') ?>

<?php
if (isset($_GET['Kennung'])) {
    $id_projet = $_GET['Kennung'];
}else{
    header("Location:/realproject");
    exit();
}

$query = "SELECT * FROM projet, promoteur, personne, secteur WHERE projet.id_promoteur_fk_projet = promoteur.id_promoteur AND promoteur.id_personne_fk_promoteur = personne.id_personne AND projet.id_secteur_fk_projet = secteur.id_secteur AND id_projet = $id_projet AND (etat_projet = 'en_cour' OR etat_projet = 'finalise')";
$statement = $db->prepare($query);
$statement->execute();

$result = $statement->fetch();



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
    <?php require_once(__DIR__ . '/../../include/header.php') ?>
    <!-- header end -->
    <main>
        <!-- page-title-area start -->
        <section class="page-title-area pt-320 pb-140" data-background="../../assets/img/slider/slider-bg-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title page-title-white text-center">
                            <h2>Consultation</h2>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li><a href="/realproject">Accueil</a></li>
                                    <li><a href="/realproject/projets">Projets</a></li>
                                    <li>Consultation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-title-area end -->

        <!-- event-area start -->
        <section class="event-area pos-relative pt-90 pb-120">
            <div class="container">
                <div class="row">
                    <div class=" col-lg-3 col-md-3">
                        <div class="fund-info mb-30">
                            <h4>Notamuse</h4>
                            <ul>
                                <li>
                                    Créer par
                                </li>
                                <li>
                                    <?= $result['nom_personne'] . ' ' . $result['prenom_personne'] ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 ">
                        <div class="event-day-time pl-15">
                            <div class="section-title mb-30">
                                <p><span></span> <?= $result['nom_secteur'] ?></p>
                                <h1><?= $result['nom_projet'] ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="bakix-video mb-60">
                            <img src="../../assets/img/causes/details/fund-video.jpg" alt="">
                            <a class="popup-video" href="https://www.youtube.com/watch?v=Y6MlVop80y0"><i class="fas fa-play"></i></a>
                        </div>
                        <div class="fund-progress mb-50">
                            <?php
                            $percent = ($result['montant_collecte_projet'] / $result['montant_total_projet']) * 100;
                            ?>
                            <div class="progress">
                                <div class="progress-bar" style="width: <?= $percent ?>%;" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="payment-count details-fund-count d-md-flex justify-content-between mt-20 fix">
                                <div class="fund-count">
                                    <h2>$<?= $result['montant_collecte_projet'] ?></h2>
                                    <span>Collecté</span>
                                </div>
                                <div class="fund-count  ">
                                    <h2>$<?= $result['montant_total_projet'] ?></h2>
                                    <span>Objectif</span>
                                </div>
                                <div class="fund-count  ">
                                    <h2>300</h2>
                                    <span>Contributeurs</span>
                                </div>
                                <div class="fund-count  ">
                                    <h2>07</h2>
                                    <span>Jours restant</span>
                                </div>
                            </div>
                        </div>
                        <div class="fund-text mb-50">
                            <p><?= $result['description_projet'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="fund-form mb-30">
                            <form id="id_paiement" action="paiement/" method="POST">
                                <input type="number" name="montant" placeholder="Entrer un montant ">
                                <button class="btn" type="submit">Contribuer <img src="../../assets/img/icon/arrow.png" alt=""></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12  ">
                        <div class="fund-right mb-30">
                            <div class="remind mb-15">
                                <a href="#" class="btn btn-black"><i class="fas fa-heart"></i> Rappelle</a>
                            </div>
                            <div class="fund-icon mb-15 ">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- event-area end -->

        <!-- fund-area start -->
        <section class="fund-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bakix-details-tab">
                            <ul class="nav text-center justify-content-center pb-30 mb-50" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Détails</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">FAQ (1)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab1" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false">Updates (2)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Comments (0)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="card-header px-0">
                                    <h3>Document</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $query1 = "SELECT nom_document FROM projet, document WHERE document.id_projet_fk_document = projet.id_projet AND id_projet = $id_projet";

                                    $statement1 = $db->prepare($query1);
                                    $statement1->execute();

                                    $result1 = $statement1->fetchAll();
                                    ?>
                                    <?php if ($result1) : ?>
                                        <div class="row">
                                            <?php foreach ($result1 as $row1) : ?>
                                                <a href="/realproject/projets/document/<?= $row1['nom_document'] ?>" download class="badge badge-light mx-2 mb-2" style="font-size: 15px;" title="Télecharger"><?= $row1['nom_document'] ?></a>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="text-right m-2"><a class="" href="#">Tout télécharger</a></div>
                                    <?php else : ?>
                                        <i class="bi bi-info-circle-fill mr-1" style="font-size: 25px; color: #5bc0de;"></i>
                                        <span style="font-size: 20px;">Les documents officielles ne sont pas disponible pour ce projet</span>
                                    <?php endif ?>
                                </div>
                                <div class="card-header px-0">
                                    <h3>Opération d'investissement</h3>
                                </div>
                                <div class="card-body">
                                    <h4 class="">Contribution à partir de : <span class="text-muted"><?= $result['min_contribution_projet'] ?>€</span></h4>
                                </div>
                                <div class="card-header px-0">
                                    <h3>Contributeurs</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $query2 = "SELECT * FROM contributeur, personne, projet, assoc_projet_and_contributeur WHERE assoc_projet_and_contributeur.id_projet_fk_assoc_projet_and_contributeur = projet.id_projet AND assoc_projet_and_contributeur.id_contributeur_fk_assoc_projet_and_contributeur = contributeur.id_contributeur AND contributeur.id_personne_fk_contributeur = personne.id_personne AND id_projet = $id_projet";

                                    $statement2 = $db->prepare($query2);
                                    $statement2->execute();

                                    $result2 = $statement2->fetchAll();
                                    $contrib_row = $statement2->rowCount();
                                    ?>
                                    <table class="table">
                                        <?php $iContrib = 1;
                                        $totalContrib = 0; ?>
                                        <thead>
                                            <tr>
                                                <th scope="col">N°</th>
                                                <th scope="col">Contributeur</th>
                                                <th scope="col">Mode de contribution</th>
                                                <th scope="col">Montant</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($result2 as $row2) : ?>
                                                <tr>
                                                    <th scope="row"><?= $iContrib ?></th>
                                                    <td><?= $row2['nom_personne'] . ' ' . $row2['prenom_personne'] ?></td>
                                                    <td>
                                                        <?= si_funct($row2['mode_contribution_assoc_projet_and_contributeur'], 'dac', 'Don avec contrepartie', '') ?>
                                                        <?= si_funct($row2['mode_contribution_assoc_projet_and_contributeur'], 'dsc', 'Don sans contrepartie', '') ?>
                                                        <?= si_funct($row2['mode_contribution_assoc_projet_and_contributeur'], 'ps', 'Prêt solidaire', '') ?>
                                                        <?= si_funct($row2['mode_contribution_assoc_projet_and_contributeur'], 'pr', 'Prêt rémunéré', '') ?>
                                                    </td>
                                                    <td><?= $row2['montant_assoc_projet_and_contributeur'] ?>€</td>
                                                </tr>
                                                <?php $iContrib++;
                                                $totalContrib += $row2['montant_assoc_projet_and_contributeur'] ?>
                                            <?php endforeach ?>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td class="text-right px-0"><b>Total =</b></td>
                                                <td><?= $totalContrib ?>€</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="faq mb-50">
                                            <h3>Bot on your network</h3>
                                            <ul>
                                                <li><a href="#">Directed to App store or Play store</a></li>
                                                <li><a href="#">Limits for Pins, boards, and follows</a></li>
                                                <li><a href="#">Merge accounts</a></li>
                                                <li><a href="#">Missing Pins or boards</a></li>
                                            </ul>
                                            <div class="faq-link mt-25">
                                                <a href="#"><i class="fas fa-caret-right"></i> Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="faq mb-50">
                                            <h3>Missing Pins or boards</h3>
                                            <ul>
                                                <li><a href="#">Directed to App store or Play store</a></li>
                                                <li><a href="#">Limits for Pins, boards, and follows</a></li>
                                                <li><a href="#">Merge accounts</a></li>
                                                <li><a href="#">Missing Pins or boards</a></li>
                                            </ul>
                                            <div class="faq-link mt-25">
                                                <a href="#"><i class="fas fa-caret-right"></i> Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="faq mb-50">
                                            <h3>Trouble with Backix?</h3>
                                            <ul>
                                                <li><a href="#">Directed to App store or Play store</a></li>
                                                <li><a href="#">Limits for Pins, boards, and follows</a></li>
                                                <li><a href="#">Merge accounts</a></li>
                                                <li><a href="#">Missing Pins or boards</a></li>
                                            </ul>
                                            <div class="faq-link mt-25">
                                                <a href="#"><i class="fas fa-caret-right"></i> Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="faq mb-50">
                                            <h3>Manage your account</h3>
                                            <ul>
                                                <li><a href="#">Directed to App store or Play store</a></li>
                                                <li><a href="#">Limits for Pins, boards, and follows</a></li>
                                                <li><a href="#">Merge accounts</a></li>
                                                <li><a href="#">Missing Pins or boards</a></li>
                                            </ul>
                                            <div class="faq-link mt-25">
                                                <a href="#"><i class="fas fa-caret-right"></i> Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="faq mb-50">
                                            <h3>Pins and boards</h3>
                                            <ul>
                                                <li><a href="#">Directed to App store or Play store</a></li>
                                                <li><a href="#">Limits for Pins, boards, and follows</a></li>
                                                <li><a href="#">Merge accounts</a></li>
                                                <li><a href="#">Missing Pins or boards</a></li>
                                            </ul>
                                            <div class="faq-link mt-25">
                                                <a href="#"><i class="fas fa-caret-right"></i> Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-xl-4 offset-xl-4 col-md-6 offset-md-3">
                                        <div class="project-unsuccessful">
                                            <h3>Project Unsuccessful</h3>
                                            <span>September 14, 2018</span>
                                        </div>
                                        <div class="project-st-date mt-50 mb-80">
                                            <span>December 2018</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1 col-md-12 ">
                                        <div class="cpe-timeline-wrapper">
                                            <div class="cpe-achievement">
                                                <div class="achievement-content">
                                                    <span>November 29, 2018</span>
                                                    <h4>Valentine's Day special pink crystal scale dial.</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                                </div>
                                            </div>
                                            <div class="cpe-achievement">
                                                <div class="achievement-content">
                                                    <span>November 29, 2018</span>
                                                    <h4>Valentine's Day special pink crystal scale dial.</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                                </div>
                                            </div>
                                            <div class="cpe-achievement">
                                                <div class="achievement-content">
                                                    <span>November 29, 2018</span>
                                                    <h4>Valentine's Day special pink crystal scale dial.</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                                </div>
                                            </div>
                                            <div class="cpe-achievement">
                                                <div class="achievement-content">
                                                    <span>November 29, 2018</span>
                                                    <h4>Valentine's Day special pink crystal scale dial.</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                                </div>
                                            </div>
                                            <div class="cpe-achievement">
                                                <div class="achievement-content">
                                                    <span>November 29, 2018</span>
                                                    <h4>Valentine's Day special pink crystal scale dial.</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                                </div>
                                            </div>
                                            <div class="cpe-achievement">
                                                <div class="achievement-content">
                                                    <span>November 29, 2018</span>
                                                    <h4>Valentine's Day special pink crystal scale dial.</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 offset-xl-4 col-md-6 offset-md-3 ">
                                        <div class="project-st-date st-date-bottom mt-50 mb-80">
                                            <span>December 2018</span>
                                        </div>
                                        <div class="project-unsuccessful project-launched">
                                            <h3>Project Launched</h3>
                                            <span>November 10, 2018</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="post-comments">
                                    <div class="blog-coment-title mb-30">
                                        <h2>03 Comments</h2>
                                    </div>
                                    <div class="latest-comments">
                                        <ul>
                                            <li>
                                                <div class="comments-box">
                                                    <div class="comments-avatar">
                                                        <img src="../../assets/img/blog/details/comments1.png" alt="">
                                                    </div>
                                                    <div class="comments-text">
                                                        <div class="avatar-name">
                                                            <h5>Karon Balina</h5>
                                                            <span>19th May 2018</span>
                                                            <a class="reply" href="#"><i class="fas fa-reply"></i>Reply</a>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                                            ex ea commodo consequat.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="children">
                                                <div class="comments-box">
                                                    <div class="comments-avatar">
                                                        <img src="../../assets/img/blog/details/comments1.png" alt="">
                                                    </div>
                                                    <div class="comments-text">
                                                        <div class="avatar-name">
                                                            <h5>Julias Roy</h5>
                                                            <span>19th May 2018</span>
                                                            <a class="reply" href="#"><i class="fas fa-reply"></i>Reply</a>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="comments-box">
                                                    <div class="comments-avatar">
                                                        <img src="../../assets/img/blog/details/comments2.png" alt="">

                                                    </div>
                                                    <div class="comments-text">
                                                        <div class="avatar-name">
                                                            <h5>Arista Williamson</h5>
                                                            <span>19th May 2018</span>
                                                            <a class="reply" href="#"><i class="fas fa-reply"></i>Reply</a>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                                            ex ea commodo consequat.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post-comments-form">
                                    <div class="post-comments-title">
                                        <h2>Post Comments</h2>
                                    </div>
                                    <form id="contacts-form" class="conatct-post-form" action="#">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="contact-icon contacts-message">
                                                    <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Your Comments...."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="contact-icon contacts-name">
                                                    <input type="text" placeholder="Your Name.... ">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="contact-icon contacts-email">
                                                    <input type="email" placeholder="Your Email....">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="contact-icon contacts-website">
                                                    <input type="text" placeholder="Your Website....">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <button class="btn" type="submit">Post comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="navigation-border pt-50 mt-40"></div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5">
                        <div class="bakix-navigation b-next-post text-left mb-30">
                            <span><a href="#">Next Post</a></span>
                            <h4><a href="#">Tips on Minimalist</a></h4>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 ">
                        <div class="bakix-filter text-left text-md-center mb-30">
                            <a href="#"><img src="../../assets/img/icon/filter.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5">
                        <div class="bakix-navigation b-next-post text-left text-md-right  mb-30">
                            <span><a href="#">Next Post</a></span>
                            <h4><a href="#">Tips on Minimalist</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Marketplace-area end -->

        <!-- brand-area start -->
        <section class="brand-area pt-110 pb-120" data-background="../../assets/img/bg/footer.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="brand-heading text-center mb-80">
                            <h3>What Client Working With BAKIX And They Are Happy</h3>
                        </div>
                        <div class="brand-active owl-carousel">
                            <div class="single-brand">
                                <img src="../../assets/img/brand/brand1.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../../assets/img/brand/brand2.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../../assets/img/brand/brand3.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../../assets/img/brand/brand4.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../../assets/img/brand/brand5.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../../assets/img/brand/brand6.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../../assets/img/brand/brand2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- brand-area end -->

    </main>

    <!-- footer start -->
    <?php require_once(__DIR__ . '/../../include/footer.php') ?>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJScy7qJ156DWM8kJVG-ZrK0R7Kize2Jg"></script>
    <script src="../../assets/js/plugins.js"></script>
    <script src="../../assets/js/main.js"></script>

    <script>
        $('#contribuer').click(function() {
            $('#id_contribuer_modal').modal('show');
            $('#id_contribuer_form')[0].reset();
        });

        $(document).on('submit', '#id_contribuer_form', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "action.php",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data == 'Contribution éffectuée') {
                        $('#id_contribuer_modal').modal('hide');
                        swal.fire({
                            title: 'Effectué',
                            text: 'La contribution à été éffectué avec succès',
                            icon: 'success',
                            showCancelButton: false,
                            buttons: true,
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location.reload();
                            } else {}
                        });

                    } else {
                        swal.fire({
                            title: 'Erreur',
                            text: 'Une erreur s\'est produite',
                            icon: 'error',
                            showCancelButton: false,
                            buttons: true,
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location.reload();
                            } else {}
                        });
                    }

                }
            })
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<?php require_once(__DIR__ . '/../../db.php') ?>
<?php require_once(__DIR__ . '/../../fonctions.php') ?>
<?php require_once(__DIR__ . '/../../fonctions-sql.php') ?>
<?php
if (!connected()) {
    header("location:/realproject/login.php");
    exit();
}
$id_contributeur = id_contributeur($db);
$id_promoteur = id_promoteur($db);
$id_personne = $_SESSION['id_personne'];
$query = "SELECT * FROM personne WHERE id_personne = $id_personne";
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

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/dropzonejs/dropzone.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        header a[id="btn_change"] {
            font-weight: 500;
            text-align: center;
            border: 1px solid transparent;
            line-height: 1;
            border-radius: 0;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            background: #6100b3;
            padding: 23px 40px;
            text-transform: uppercase;
            font-size: 12px;
            color: #fff;
            height: 60px;
            letter-spacing: 2px;
        }

        header a {
            font-weight: bold !important;
        }

        header a[id="btn_change"]:hover {
            background-color: #1b70f0 !important;
            color: white;
        }

        a[class="login-btn"]:hover {
            background-color: #1b70f0 !important;
            color: white;
        }
    </style>

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
                            <h2>Profil</h2>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li><a href="/realproject">Accueil</a></li>
                                    <li><a href="/realproject/projets">Projets</a></li>
                                    <li>Profil</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-title-area end -->

        <section class="section p-50">
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card author-box">
                            <div class="card-body">
                                <div class="author-box-center">
                                    <img id="img_update" alt="image" src="assets/img/users/<?= $result['img_personne'] ?>" data-toggle="tooltip" data-placement="bottom" title="Modifier" style="cursor: pointer;" class="rounded-circle author-box-picture">
                                    <div class="clearfix"></div>
                                    <div class="author-box-name">
                                        <a href="#"><?= $result['nom_personne'] ?></a>
                                    </div>
                                    <div class="author-box-job"><?= si_funct(user_type(), 'contributeur', 'Contributeur', 'Promoteur') ?></div>
                                </div>
                                <div class="text-center">
                                    <div class="author-box-description">
                                        <p>
                                            <?= $result['bio_personne'] ?>
                                        </p>
                                    </div>
                                    <div class="mb-2 mt-3">
                                        <div class="text-small font-weight-bold">Follow Hasan On</div>
                                    </div>
                                    <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-social-icon mr-1 btn-github">
                                        <i class="fab fa-github"></i>
                                    </a>
                                    <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <?php if (user_type() == 'promoteur') : ?>
                                        <a href="/realproject/pages/profile/tb/tb-promoteur.php" target="_blank" class="dropdown-item has-icon mt-2">
                                            <i class="fas fa-sign-out-alt" style="float: none;"></i>Accéder au tableau de bord</a>
                                    <?php endif ?>
                                    <a href="/realproject/deconnexion.php" class="dropdown-item has-icon text-danger mt-2">
                                        <i class="fas fa-sign-out-alt" style="float: none;"></i>Deconnexion
                                    </a>
                                    <div class="w-100 d-sm-none"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Personal Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="py-4">
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Birthday
                                        </span>
                                        <span class="float-right text-muted">
                                            <?= date("d-m-Y", strtotime($result['date_naiss_personne'])) ?>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Phone
                                        </span>
                                        <span class="float-right text-muted">
                                            <?= $result['tel_personne'] ?>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Mail
                                        </span>
                                        <span class="float-right text-muted">
                                            <?= $result['email_personne'] ?>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Facebook
                                        </span>
                                        <span class="float-right text-muted">
                                            <a href="#"><?= $result['nom_personne'] . ' ' . $result['prenom_personne'] ?></a>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Twitter
                                        </span>
                                        <span class="float-right text-muted">
                                            <a href="#">@<?= $result['prenom_personne'] ?></a>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Skills</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title">Java</div>
                                        </div>
                                        <div class="media-progressbar p-t-10">
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-primary" data-width="70%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title">Web Design</div>
                                        </div>
                                        <div class="media-progressbar p-t-10">
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-warning" data-width="80%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title">Photoshop</div>
                                        </div>
                                        <div class="media-progressbar p-t-10">
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-green" data-width="48%"></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="card">
                            <div class="padding-20">
                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab" aria-selected="true">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Setting</a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-bordered" id="myTab3Content">
                                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                                        <div class="row">
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"><?= $result['nom_personne'] . ' ' . $result['prenom_personne'] ?></p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted"><?= $result['tel_personne'] ?></p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?= $result['email_personne'] ?></p>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <strong>Location</strong>
                                                <br>
                                                <p class="text-muted"><?= $result['nationnalite_personne'] ?></p>
                                            </div>
                                        </div>
                                        <p class="m-t-30">Completed my graduation in Arts from the well known and
                                            renowned institution
                                            of India – SARDAR PATEL ARTS COLLEGE, BARODA in 2000-01, which was
                                            affiliated
                                            to M.S. University. I ranker in University exams from the same
                                            university
                                            from 1996-01.</p>
                                        <p>Worked as Professor and Head of the department at Sarda Collage, Rajkot,
                                            Gujarat
                                            from 2003-2015 </p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when
                                            an unknown printer took a galley of type and scrambled it to make a
                                            type
                                            specimen book. It has survived not only five centuries, but also the
                                            leap
                                            into electronic typesetting, remaining essentially unchanged.</p>
                                        <div class="section-title">Education</div>
                                        <ul>
                                            <li>B.A.,Gujarat University, Ahmedabad,India.</li>
                                            <li>M.A.,Gujarat University, Ahmedabad, India.</li>
                                            <li>P.H.D., Shaurashtra University, Rajkot</li>
                                        </ul>
                                        <div class="section-title">Experience</div>
                                        <ul>
                                            <li>One year experience as Jr. Professor from April-2009 to march-2010
                                                at B.
                                                J. Arts College, Ahmedabad.</li>
                                            <li>Three year experience as Jr. Professor at V.S. Arts &amp; Commerse
                                                Collage
                                                from April - 2008 to April - 2011.</li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                            </li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                            </li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                            </li>
                                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                            </li>
                                        </ul>
                                        <div class="section-title">Projets contribués</div>
                                        
                                    </div>
                                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                        <form method="post" class="needs-validation">
                                            <div class="card-header">
                                                <h4>Edit Profile</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6 col-12">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" value="<?= $result['nom_personne'] ?>">
                                                        <div class="invalid-feedback">
                                                            Please fill in the first name
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 col-12">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" value="<?= $result['prenom_personne'] ?>">
                                                        <div class="invalid-feedback">
                                                            Please fill in the last name
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-7 col-12">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" value="<?= $result['email_personne'] ?>">
                                                        <div class="invalid-feedback">
                                                            Please fill in the email
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-5 col-12">
                                                        <label>Phone</label>
                                                        <input type="tel" class="form-control" value="<?= $result['tel_personne'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <label>Bio</label>
                                                        <textarea class="form-control summernote-simple"><?= $result['bio_personne'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group mb-0 col-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                                                            <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                                                            <div class="text-muted form-text">
                                                                You will get new information about products, offers and promotions
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <button class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal window-->
        <div id="id_img_update_modal" class="modal fade mt-200">
            <form action="#" class="dropzone" id="mydropzone" style="margin: 0px 250px;">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
        </div>

    </main>

    <!-- footer start -->
    <?php require_once(__DIR__ . '/../../include/footer.php') ?>
    <!-- footer end -->





    <!-- JS here -->
    <script src="../../assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- <script src="../../assets/js/popper.min.js"></script> -->
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

    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/summernote/summernote-bs4.js"></script>

    <!-- Page Specific JS File -->
    <!-- Template JS File -->

    <script src="assets/bundles/dropzonejs/min/dropzone.min.js"></script>
    <script src="assets/js/page/multiple-upload.js"></script>

    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>

    <script>
        $('#img_update').click(function() {
            $('#id_img_update_modal').modal('show');
            $('#mydropzone')[0].reset();
        });
    </script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>



</html>
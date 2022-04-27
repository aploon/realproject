<?php require_once(__DIR__ . '/../../db.php') ?>
<?php require_once(__DIR__ . '/../../fonctions.php') ?>
<?php require_once(__DIR__ . '/../../fonctions-sql.php') ?>

<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bakix - Crowdfunding Startup Fundraising HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/bundles/pretty-checkbox/pretty-checkbox.min.css">

    <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
    <!-- Template CSS -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/components.css"> -->
    <!-- Custom style CSS -->
    <!-- <link rel="stylesheet" href="assets/css/custom.css"> -->
    <!-- <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' /> -->

    <!--Form wizard-->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/bundles/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="assets/bundles/codemirror/theme/duotone-dark.css">
    <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">

    <!--Multiple upload-->

    <!--Default css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/custom.css">




    <style>
        ::selection {
            background-color: #007bff;
            color: white;
        }

        /* Firefox */
        ::-moz-selection {
            background-color: #007bff;
            color: white;
        }

        body {
            background-color: rgb(255, 255, 255);
        }

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

        a:hover {
            text-decoration: none;
        }

        header a[id="btn_change"]:hover {
            background-color: #1b70f0 !important;
            color: white;
        }

        a[class="login-btn"]:hover {
            background-color: #1b70f0 !important;
            color: white;
        }

        .presentation-promoteur {
            font-family: "Nunito", "Segoe UI", arial;
            font-weight: 400;
        }

        input[type="checkbox"] {
            width: 13px;
            height: 13px;
            margin: 4px 0px 0px 0px;
            padding: 0px;

        }

        input[type="checkbox"]+label {
            display: inline-block !important;
        }

        button[type="submit"] {
            background-color: #062a4d !important;
            color: white;
        }

        button[type="submit"]:hover {
            background-color: #6100b3 !important;
            color: white;
        }

        .mode {
            padding-left: 25px !important;
        }

        .wizard-sub {
            background: #6777ef;
            color: #fff;
            display: block;
            padding: 0.5em 1em;
            text-decoration: none;
            border-radius: 0px;
            outline: 0;
            border: 1px solid transparent;
        }

        .note-toolbar {
            background-color: #00000003 !important;
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
                            <h2>Soumission</h2>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li><a href="/realproject">Accueil</a></li>
                                    <li><a href="/realproject/projets">Projets</a></li>
                                    <li>Soumission</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-title-area end -->


        <div class="login-area pt-120 pb-120">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="basic-login option">
                            <h3 class="text-center mb-60">Formulaire de soumission du projet</h3>

                            <form id="form_soumission" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <label class="form-label">Titre du projet*</label>
                                    <input type="text" class="form-control" name="nom_projet" required>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <label class="form-label">Description du projet* <i class="bi bi-info-circle-fill mr-1" data-toggle="tooltip" data-placement="bottom" title="Ecrivez l'essentiel à savoir sur votre projet(maximun 250 caractères)" style="font-size: 13px; color: gray;"></i></label>
                                        <textarea type="text" class="form-control" name="description_projet" required></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group pretty p-icon p-round p-pulse col-6 col-md-4 mx-0">
                                        <input id="prix1" type="radio" name="montant_total_projet" value="50000">
                                        <div class="state p-info-o">
                                            <i class="icon material-icons">done</i>
                                            <label for="prix1"> 50000 Fcfa</label>
                                        </div>
                                    </div>
                                    <div class="form-group pretty p-icon p-round p-pulse col-6 col-md-4 mx-0">
                                        <input id="prix2" type="radio" name="montant_total_projet" value="100000">
                                        <div class="state p-info-o">
                                            <i class="icon material-icons">done</i>
                                            <label for="prix2"> 100000 Fcfa</label>
                                        </div>
                                    </div>
                                    <div class="form-group pretty p-icon p-round p-pulse col-6 col-md-4 mx-0">
                                        <input id="prix3" type="radio" name="montant_total_projet" value="200000">
                                        <div class="state p-info-o">
                                            <i class="icon material-icons">done</i>
                                            <label for="prix3"> 200000 Fcfa</label>
                                        </div>
                                    </div>
                                    <div class="form-group pretty p-icon p-round p-pulse col-6 col-md-4 mx-0">
                                        <input id="prix4" type="radio" name="montant_total_projet" value="300000">
                                        <div class="state p-info-o">
                                            <i class="icon material-icons">done</i>
                                            <label for="prix4"> 300000 Fcfa</label>
                                        </div>
                                    </div>
                                    <div class="form-group pretty p-icon p-round p-pulse col-6 col-md-4 mx-0">
                                        <input id="prix5" type="radio" name="montant_total_projet" value="400000">
                                        <div class="state p-info-o">
                                            <i class="icon material-icons">done</i>
                                            <label for="prix5"> 400000 Fcfa</label>
                                        </div>
                                    </div>
                                    <div class="form-group pretty p-icon p-round p-pulse col-6 col-md-4 mx-0">
                                        <input id="prix6" type="radio" name="montant_total_projet" value="500000">
                                        <div class="state p-info-o">
                                            <i class="icon material-icons">done</i>
                                            <label for="prix6"> 500000 Fcfa</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" style="font-size: 14px; cursor:default;">Mode de contribution</label>
                                    <div class="mode">
                                        <div class="">
                                            <input type="checkbox" name="modeContrib[]" value="dac" id="dac">
                                            <label for="dac">
                                                Don avec contrepartie
                                                <i class="bi bi-info-circle-fill mr-1" data-toggle="tooltip" data-placement="bottom" title="Don avec contrepartie" style="margin-left: 10px; font-size: 15px; color: gray;"></i>
                                            </label>
                                        </div>
                                        <div class="">
                                            <input type="checkbox" name="modeContrib[]" value="dsc" id="dsc">
                                            <label for="dsc">
                                                Don sans contrepartie
                                                <i class="bi bi-info-circle-fill mr-1" data-toggle="tooltip" data-placement="bottom" title="Don sans contrepartie" style="margin-left: 10px; font-size: 15px; color: gray;"></i>
                                            </label>
                                        </div>
                                        <div class="">
                                            <input type="checkbox" name="modeContrib[]" value="ps" id="ps">
                                            <label for="ps">
                                                Prêt sans intérêts
                                                <i class="bi bi-info-circle-fill mr-1" data-toggle="tooltip" data-placement="bottom" title="Prêt solidaire" style="margin-left: 10px; font-size: 15px; color: gray;"></i>
                                            </label>
                                        </div>
                                        <div class="">
                                            <input type="checkbox" name="modeContrib[]" value="pr" id="pr">
                                            <label for="pr">
                                                Prêt avec intérêts
                                                <i class="bi bi-info-circle-fill mr-1" data-toggle="tooltip" data-placement="bottom" title="Prêt rémunéré" style="margin-left: 10px; font-size: 15px; color: gray;"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" > Fichier 1</label>
                                        <input type="file" name="fichier1" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" > Fichier 2</label>
                                        <input type="file" name="fichier2" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" > Fichier 3</label>
                                        <input type="file" name="fichier3" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" > Fichier 4</label>
                                        <input type="file" name="fichier4" class="form-control">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-black w-100">Soumettre le projet</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- brand-area start -->
        <section class="brand-area pt-110 pb-120" data-background="../../assets/img/bg/footer.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="brand-heading text-center mb-80">
                            <h3>Sponsore officiel de realproject</h3>
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

    <!--Form wizard-->
    <script src="assets/bundles/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="assets/bundles/jquery-steps/jquery.steps.min.js"></script>
    <script src="assets/js/page/form-wizard.js"></script>

    <!--Editor-->
    <script src="assets/bundles/summernote/summernote-bs4.js"></script>
    <script src="assets/bundles/codemirror/lib/codemirror.js"></script>
    <script src="assets/bundles/codemirror/mode/javascript/javascript.js"></script>
    <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="assets/bundles/ckeditor/ckeditor.js"></script>
    <script src="assets/js/page/ckeditor.js"></script>



    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>

    <script>
        $(document).ready(function() {

            $(document).on('submit', '#form_soumission', function(event) {
                event.preventDefault();

                var form_data = new FormData(this);

                $.ajax({
                    url: "action.php",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);

                        if (data == 'Projet soumit') {
                            swal.fire({
                                title: 'Soumit',
                                text: 'Le projet à été soumit pour analyse avec success',
                                icon: 'success',
                                showCancelButton: false,
                                buttons: true,
                                dangerMode: true,
                            }).then((willDelete) => {
                                if (willDelete) {
                                    window.location = "/realproject";
                                } else {}
                            });
                        } else {
                            swal.fire({
                                title: 'Erreur',
                                text: 'Une erreue s\'est produite lors de la soumission',
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
                });


            });

        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>



</html>
<?php require_once(__DIR__ . '/../../db.php') ?>
<?php require_once(__DIR__ . '/../../fonctions.php') ?>
<?php require_once(__DIR__ . '/../../fonctions-sql.php') ?>


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
                            <h2>Contact</h2>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li><a href="/realproject">Accueil</a></li>
                                    <li><a href="/realproject/projets">Projets</a></li>
                                    <li>Contact</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-title-area end -->

        <!-- contact-area start -->
        <section class="contact-area pt-120 pb-90" data-background="assets/img/bg/bg-map.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="contact text-center mb-30">
                            <i class="fas fa-envelope"></i>
                            <h3>Mail Here</h3>
                            <p>info@example.com</p>
                            <p>info@webmail.com</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="contact text-center mb-30">
                            <i class="fas fa-map-marker-alt"></i>
                            <h3>Visit Here</h3>
                            <p>27 Division St, New York, NY 10002,
                                Jaklina, United Kingpung</p>
                        </div>
                    </div>
                    <div class="col-xl-4  col-lg-4 col-md-4 ">
                        <div class="contact text-center mb-30">
                            <i class="fas fa-phone"></i>
                            <h3>Call Here</h3>
                            <p>+8 (123) 985 789</p>
                            <p>+787 878897 87</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area end -->
        <!-- contact-form-area start -->
        <section class="contact-form-area">
            <div class="container">
                <div class="form-wrapper grey-bg">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-8">
                            <div class="section-title mb-55">
                                <p><span></span> Anything On your Mind</p>
                                <h1>Estimate Your Idea</h1>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-3 d-none d-xl-block ">
                            <div class="section-link mb-80 text-right">
                                <a class="btn-border btn-theme" href="#"><i class="fas fa-phone"></i> make call</a>
                            </div>
                        </div>
                    </div>
                    <div class="contact-form">
                        <form id="contact-form" action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-box user-icon mb-30">
                                        <input type="text" name="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-box email-icon mb-30">
                                        <input type="text" name="email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-box phone-icon mb-30">
                                        <input type="text" name="phone" placeholder="Your Phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-box subject-icon mb-30">
                                        <input type="text" name="subject" placeholder="Your Subject">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box message-icon mb-30">
                                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="contact-btn text-center">
                                        <button class="btn" type="submit">get action <img src="assets/img/icon/arrow.png" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="ajax-response text-center"></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-form-area end -->

        <section class="map-area">
            <div id="contact-map" class="contact-map"></div>
        </section>

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
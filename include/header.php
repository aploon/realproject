<header id="sticky-header" class="header header-transparent mt-60">
    <div class="container">
        <div class="header-box white-bg pl-50 pr-50">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-3 col-5 d-flex align-items-center">
                    <div class="header__logo">
                        <a href="/realproject"><img src="/realproject/assets/img/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-7 col-md-9">
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
                        <div class="header__icon f-right mt-30 ml-30 d-none d-md-block">
                            <a class="btn" id="btn_change" href="/realproject/projets/<?= si_funct(user_type(), 'contributeur', 'en-financement', 'soumission')?>/"><?= si_funct(user_type(), 'contributeur', 'Financer un projet', 'Soumettre projet')?></a>
                        </div>
                    </div>
                    <div class="header__menu f-right">
                        <nav id="mobile-menu">
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
                                            <?php if($compteRowH < 5) : ?>
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
                </div>
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>
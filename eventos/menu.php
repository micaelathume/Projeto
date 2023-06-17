<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="#">
                </a>
                <h1 class="title-1">Eventos</h1>
            </div>

            <div class="header-button">
                <div class="header-wrap">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="images/icon/avatar.png"/>
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo $_SESSION['nome'] ?? "" ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="images/icon/avatar.png"/>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?php echo $_SESSION['nome'] ?? ""?></a>
                                        </h5>
                                        <span class="email"><?php echo $_SESSION['email'] ?? ""?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Conta</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="logout.php">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="index.php">
            <img src="images/icon/logo.png" alt="Cool Admin"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="index.php">
                        <i class="fas fa-user"></i>Minhas inscrições</a>
                </li>
                <li>
                    <a href="evento.php">
                        <i class="fas fa-calendar-alt"></i>Eventos</a>
                </li>
                <li>
                    <a href="checkin.php">
                        <i class="fas fa-calendar-check-o"></i>Check-in</a>
                </li>
                <li>
                    <a href="certificado.php">
                        <i class="fas fa-check-circle"></i>Validar certificado</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->

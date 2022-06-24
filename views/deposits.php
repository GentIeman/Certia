<?php
include("../modules/current_session.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Web resource for Certia Bank">
    <meta name="keywords" content="deposits, certia, Bank, Deposits, Certia">
    <meta name="author" content="Ilya Shepelev">
    <meta name="copyright" content="Ilya Shepelev">
    <meta name="publisher" content="Ilya Shepelev">
    <meta name="robots" content="all">
    <title>Deposits</title>
    <link rel="stylesheet" href="../assets/stylus/deposits.css">
    <link rel="stylesheet" href="../assets/stylus/base.css">
    <link rel="stylesheet" href="../assets/stylus/global.css">
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <script src="../static/scripts/search.js" defer></script>
    <script src="../static/scripts/theme.js" defer></script>
</head>
<body>
<header class="header">
    <nav class="header__nav">
        <a href="./home.php" class="header__logo" title="Logo"></a>
        <ul class="header__list">
            <li class="header__item header__item_theme-switch header__item_hover header__item_focus">
                <label class="header__label">
                    <input type="checkbox" class="header__checkbox">
                    <span class="header__theme-icon"></span>
                </label>
            </li>
            <li class="header__item header__item_search header__item_hover header__item_focus">
                <button class="header__btn btn search" title="Search"></button>
            </li>
            <li class="header__item header__item_menu-burger header__item_hover header__item_focus dropdown">
                <button class="header__btn btn menu-burger" title="Menu"></button>
                <div class="dropdown__content">
                    <ul class="dropdown__list">
                        <li class="dropdown__item dropdown__item_focus dropdown__item_hover">
                            <span class="dropdown__icon home-icon"></span>
                            <a href="./home.php" class="dropdown__link">Home</a>
                        </li>
                        <li class="dropdown__item dropdown__item_focus dropdown__item_hover">
                            <span class="dropdown__icon money-icon"></span>
                            <a href="./credits.php" class="dropdown__link">Credits</a>
                        </li>
                        <li class="dropdown__item dropdown__item_focus dropdown__item_hover dropdown__item_active">
                            <span class="dropdown__icon pyramid-icon"></span>
                            <a href="#" class="dropdown__link">Deposits</a>
                        </li>
                        <li class="dropdown__item dropdown__item_focus dropdown__item_hover">
                            <span class="dropdown__icon bank-icon"></span>
                            <a href="./aboutus.php" class="dropdown__link">About us</a>
                        </li>
                        <?php if (isset($_SESSION["user"]) === true): ?>
                            <li class="dropdown__item dropdown__item_focus dropdown__item_hover">
                                <span class="dropdown__icon user-icon"></span>
                                <a href="./profile.php" class="dropdown__link">Profile</a>
                            </li>
                        <?php else: ?>
                            <li class="dropdown__item dropdown__item_focus dropdown__item_hover">
                                <span class="dropdown__icon user-icon"></span>
                                <a href="./signin.php" class="dropdown__link">Sign in</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION["user"]) === true): ?>
                            <li class="dropdown__item dropdown__item_focus dropdown__item_hover">
                                <span class="dropdown__icon log-out-icon"></span>
                                <a href="./index.php?section=logout" class="dropdown__link">Log out</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</header>
<div class="search-backdrop">
    <div class="search-container">
        <div class="search search_hover search_focus">
            <label>
                <input type="search" class="search__input search__input_placeholder-color" placeholder="Search">
            </label>
            <button class=" search__btn search__btn_hover search__btn_focus btn btn_background search-wt-icon"
                    title="Search"></button>
        </div>
        <div class="results">
            <ul class="results__list">
            </ul>
        </div>
    </div>
</div>
<section class="deposits">
    <header class="deposits__header">
        <h1 class="deposits__headline headings">Deposits</h1>
    </header>
    <ul class="deposits__cards">
        <li class="deposits__card">
            <div class="deposits__card-content">
                <h2 class="deposits__card-headline">Behind the wall</h2>
                <div class="deposits__card-description">
                    <p class="deposits__card-description-title">from 12%
                        <span class="deposits__card-description-subtitle">Income</span>
                    </p>
                    <p class="deposits__card-description-title">from 10$
                        <span class="deposits__card-description-subtitle">Min. amount</span>
                    </p>
                    <p class="deposits__card-description-title">∞
                        <span class="deposits__card-description-subtitle">Perpetual</span>
                    </p>
                </div>
                <a href="./deposits-processing.php" class="deposits__card-link">Learn more</a>
            </div>
            <div class="deposits__card-image layout-fluid-icon"></div>
        </li>
        <li class="deposits__card">
            <div class="deposits__card-content">
                <h2 class="deposits__card-headline">New time</h2>
                <div class="deposits__card-description">
                    <p class="deposits__card-description-title">from 5%
                        <span class="deposits__card-description-subtitle">Income</span>
                    </p>
                    <p class="deposits__card-description-title">from 1000$
                        <span class="deposits__card-description-subtitle">Min. amount</span>
                    </p>
                    <p class="deposits__card-description-title">180 days
                        <span class="deposits__card-description-subtitle">Term</span>
                    </p>
                </div>
                <a href="#" class="deposits__card-link">Learn more</a>
            </div>
            <div class="deposits__card-image clock-icon"></div>
        </li>
        <li class="deposits__card">
            <div class="deposits__card-content">
                <h2 class="deposits__card-headline">A solid foundation</h2>
                <div class="deposits__card-description">
                    <p class="deposits__card-description-title">from 8%
                        <span class="deposits__card-description-subtitle">Income</span>
                    </p>
                    <p class="deposits__card-description-title">from 2000$
                        <span class="deposits__card-description-subtitle">Min. amount</span>
                    </p>
                    <p class="deposits__card-description-title">1 year
                        <span class="deposits__card-description-subtitle">Term</span>
                    </p>
                </div>
                <a href="#" class="deposits__card-link">Learn more</a>
            </div>
            <div class="deposits__card-image chart-pyramid-icon"></div>
        </li>
        <li class="deposits__card">
            <div class="deposits__card-content">
                <h2 class="deposits__card-headline">History of success</h2>
                <div class="deposits__card-description">
                    <p class="deposits__card-description-title">from 5%
                        <span class="deposits__card-description-subtitle">Income</span>
                    </p>
                    <p class="deposits__card-description-title">from 5000$
                        <span class="deposits__card-description-subtitle">Min. amount</span>
                    </p>
                    <p class="deposits__card-description-title">720 days
                        <span class="deposits__card-description-subtitle">Term</span>
                    </p>
                </div>
                <a href="#" class="deposits__card-link">Learn more</a>
            </div>
            <div class="deposits__card-image chat-arrow-grow-icon"></div>
        </li>
    </ul>
</section>
<footer class="footer">
    <div class="footer__menu">
        <div class="footer__logo"></div>
        <ul class="footer__list">
            <li class="footer__item">
                <a href="./home.php" class="footer__link footer__link_hover footer__link_focus">Home</a>
            </li>
            <li class="footer__item">
                <a href="./credits.php" class="footer__link footer__link_hover footer__link_focus">Credits</a>
            </li>
            <li class="footer__item">
                <a href="#" class="footer__link footer__link_hover footer__link_focus">Deposits</a>
            </li>
            <li class="footer__item">
                <a href="./aboutus.php" class="footer__link footer__link_hover footer__link_focus">About us</a>
            </li>
            <li class="footer__item">
                <a href="./profile.php" class="footer__link footer__link_hover footer__link_focus">Profile</a>
            </li>
        </ul>
    </div>
    <div class="footer__about-us">
        <h2 class="footer__headline">About us</h2>
        <p class="footer__description">
            Our bank follows the trends, follows the development of technology and does everything possible to make you
            feel good with us.
        </p>
        <ul class="footer__social-media">
            <li tabindex="0"
                class="footer__social-network footer__social-network_hover footer__social-network_focus instagram"></li>
            <li tabindex="0"
                class="footer__social-network footer__social-network_hover footer__social-network_focus twitter"></li>
            <li tabindex="0"
                class="footer__social-network footer__social-network_hover footer__social-network_focus linkedin"></li>
            <li tabindex="0"
                class="footer__social-network footer__social-network_hover footer__social-network_focus facebook"></li>
        </ul>
    </div>
    <div class="footer__contacts">
        <h2 class="footer__headline">Contacts</h2>
        <ul class="footer__contacts-list">
            <li class="footer__contacts-item">
                <span class="footer__icon phone"></span>
                <a href="tel:89031234567" class="footer__link footer__link_hover footer__link_focus">8 903 123 45 67</a>
            </li>
            <li class="footer__contacts-item">
                <span class="footer__icon email"></span>
                <a href="mailto:certia@gmail.com" class="footer__link footer__link_hover footer__link_focus">certia@gmail.com</a>
            </li>
        </ul>
    </div>
</footer>
</body>
</html>
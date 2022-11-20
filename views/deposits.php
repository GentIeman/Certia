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
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/sass/styles/deposits.css">
    <link rel="stylesheet" href="../assets/sass/global.css">
    <script src="../static/scripts/search.js" defer></script>
    <script src="../static/scripts/dropdown-toggle.js" defer></script>
</head>
<body>
<header class="header">
    <nav class="header__nav">
        <a href="#" class="header__logo" title="Logo"></a>
        <ul class="header__list">
            <li class="header__item">
                <button class="header__btn header__btn_hover header__btn_focus header__btn_search btn" title="Search"></button>
            </li>
            <li class="header__item dropdown">
                <button class="header__btn header__dropdown-btn header__btn_hover header__btn_focus header__btn_burger btn" title="Menu"></button>
                <div class="dropdown__content">
                    <ul class="dropdown__list">
                        <li class="dropdown__item">
                            <a href="#" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                <span class="dropdown__icon home-icon"></span>
                                Home
                            </a>
                        </li>
                        <li class="dropdown__item ">
                            <a href="loans.php" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                <span class="dropdown__icon money-icon"></span>
                                Credits
                            </a>
                        </li>
                        <li class="dropdown__item ">
                            <a href="./deposits.php" class="dropdown__link dropdown__link_focus dropdown__link_hover dropdown__link_active">
                                <span class="dropdown__icon pyramid-icon"></span>
                                Deposits
                            </a>
                        </li>
                        <li class="dropdown__item ">
                            <a href="company.php" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                <span class="dropdown__icon bank-icon"></span>
                                About us
                            </a>
                        </li>
                        <?php if (isset($_SESSION["user"]) === true): ?>
                            <li class="dropdown__item">
                                <a href="./profile.php" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                    <span class="dropdown__icon user-icon"></span>
                                    Profile
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="dropdown__item">
                                <a href="login.php" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                    <span class="dropdown__icon user-icon"></span>
                                    Sign in
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION["user"]) === true && $_SESSION["user"]->role == "admin"): ?>
                            <li class="dropdown__item">
                                <a href="./admin.php" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                    <span class="dropdown__icon admin-icon"></span>
                                    Admin
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION["user"]) === true): ?>
                            <li class="dropdown__item">
                                <a href="../index.php?page=logout" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                    <span class="dropdown__icon log-out-icon"></span>
                                    Log out
                                </a>
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
        <label class="search search_hover search_focus">
            <input type="search" class="search__input input search__input_placeholder-color" placeholder="Search">
            <button class="search__btn search__btn_hover search__btn_focus btn" title="Search"></button>
        </label>
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
                    <p class="deposits__card-description-title">270 days
                        <span class="deposits__card-description-subtitle">Term</span>
                    </p>
                </div>
                <a href="./deposits-processing.php?plan_id=5" class="deposits__card-link">Learn more</a>
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
                <a href="./deposits-processing.php?plan_id=6" class="deposits__card-link">Learn more</a>
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
                    <p class="deposits__card-description-title">365 days
                        <span class="deposits__card-description-subtitle">Term</span>
                    </p>
                </div>
                <a href="./deposits-processing.php?plan_id=7" class="deposits__card-link">Learn more</a>
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
                <a href="./deposits-processing.php?plan_id=8" class="deposits__card-link">Learn more</a>
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
                <a href="#" class="footer__link footer__link_hover footer__link_focus">Home</a>
            </li>
            <li class="footer__item">
                <a href="loans.php" class="footer__link footer__link_hover footer__link_focus">Credits</a>
            </li>
            <li class="footer__item">
                <a href="./deposits.php" class="footer__link footer__link_hover footer__link_focus">Deposits</a>
            </li>
            <li class="footer__item">
                <a href="company.php" class="footer__link footer__link_hover footer__link_focus">About us</a>
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
                <a href="tel:89031234567" class="footer__link footer__link_hover footer__link_focus">
                    <span class="footer__icon phone"></span>
                    8 903 123 45 67
                </a>
            </li>
            <li class="footer__contacts-item">
                <a href="mailto:certia@gmail.com" class="footer__link footer__link_hover footer__link_focus">
                    <span class="footer__icon email"></span>
                    certia@gmail.com
                </a>
            </li>
        </ul>
    </div>
    <p class="footer__slogan">Certia - convenient everywhere and in everything</p>
</footer>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Web resource for Certia Bank">
    <meta name="keywords" content="bank, certia, Bank, Certia">
    <meta name="author" content="Ilya Shepelev">
    <meta name="copyright" content="Ilya Shepelev">
    <meta name="publisher" content="Ilya Shepelev">
    <meta name="robots" content="all">
    <title>Certia - convenient everywhere and in everything</title>
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/sass/global.css">
    <link rel="stylesheet" href="../assets/sass/styles/home.css">
    <script src="../static/scripts/search.js" defer></script>
    <script src="../static/scripts/carousel.js" defer></script>
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
                            <a href="#" class="dropdown__link dropdown__link_focus dropdown__link_hover dropdown__link_active">
                                <span class="dropdown__icon home-icon"></span>
                                Home
                            </a>
                        </li>
                        <li class="dropdown__item">
                            <a href="../index.php?page=loans" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                <span class="dropdown__icon money-icon"></span>
                                Loans
                            </a>
                        </li>
                        <li class="dropdown__item">
                            <a href="../index.php?page=deposits" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                <span class="dropdown__icon pyramid-icon"></span>
                                Deposits
                            </a>
                        </li>
                        <li class="dropdown__item">
                            <a href="../index.php?page=company" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                <span class="dropdown__icon bank-icon"></span>
                                About us
                            </a>
                        </li>
                        <?php if (isset($_SESSION["user"]) === true): ?>
                            <li class="dropdown__item">
                                <a href="../index.php?page=profile" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                    <span class="dropdown__icon user-icon"></span>
                                    Profile
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="dropdown__item">
                                <a href="../index.php?page=login" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                    <span class="dropdown__icon user-icon"></span>
                                    Sign in
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION["user"]) === true && $_SESSION["user"]->roles_id == 1): ?>
                            <li class="dropdown__item">
                                <a href="../index.php?page=admin-panel" class="dropdown__link dropdown__link_focus dropdown__link_hover">
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
<section class="hero">
    <div class="carousel">
        <ul class="carousel__track">
            <li class="carousel__slide">
                <div class="carousel__slide-content">
                    <div class="carousel__slide-text">
                        <h1 class="carousel__slide-headline">
                            <span class="carousel__title">Important information for our users</span>
                            <span class="carousel__subtitle">Our bank is working as usual</span>
                        </h1>
                        <a tabindex="-1" href="#" class="carousel__link carousel__link_hover">Learn more</a>
                    </div>
                    <div class="carousel__image european-anglerfish"></div>
                </div>
            </li>
            <li class="carousel__slide">
                <div class="carousel__slide-content">
                    <div class="carousel__slide-text">
                        <h1 class="carousel__slide-headline">
                            <span class="carousel__title">End of Covid - 19</span>
                            <span class="carousel__subtitle">Our team has started to work in full force</span>
                        </h1>
                        <a tabindex="-1" href="#" class="carousel__link carousel__link_hover">Learn more</a>
                    </div>
                    <div class="carousel__image bedroom"></div>
                </div>
            </li>
            <li class="carousel__slide">
                <div class="carousel__slide-content">
                    <div class="carousel__slide-text">
                        <h1 class="carousel__slide-headline">
                            <span class="carousel__title">Work tirelessly</span>
                            <span class="carousel__subtitle">We work day and night to do more for you</span>
                        </h1>
                        <a tabindex="-1" href="#" class="carousel__link carousel__link_hover">Learn more</a>
                    </div>
                    <div class="carousel__image owl"></div>
                </div>
            </li>
        </ul>
        <ul class="carousel__dots">
            <li tabindex="0" class="carousel__dot carousel__dot_hover carousel__dot_focus carousel__dot_active">
                <div class="carousel__dot-image info-icon"></div>
                <p class="carousel__dot-content">
                    Important information for our users
                </p>
            </li>
            <li tabindex="0" class="carousel__dot carousel__dot_hover carousel__dot_focus">
                <div class="carousel__dot-image smile-icon"></div>
                <p class="carousel__dot-content">
                    We are with us again
                </p>
            </li>
            <li tabindex="0" class="carousel__dot carousel__dot_hover carousel__dot_focus">
                <div class="carousel__dot-image laptop-icon"></div>
                <p class="carousel__dot-content">
                    Hands are always ready
                </p>
            </li>
        </ul>
    </div>
</section>
<section class="offers">
    <header class="offers__header">
        <h1 class="offers__headline headings">Our offers</h1>
    </header>
    <ul class="offers__list">
        <li class="offers__card">
            <div class="offers__card-image saving"></div>
            <div class="offers__card-content">
                <p class="offers__card-description">Deposits up to 7.10%</p>
            </div>
        </li>
        <li class="offers__card">
            <div class="offers__card-image forex"></div>
            <div class="offers__card-content">
                <p class="offers__card-description">Transfers to another currency</p>
            </div>
        </li>
        <li class="offers__card">
            <div class="offers__card-image lend"></div>
            <div class="offers__card-content">
                <p class="offers__card-description">Credit from 7%</p>
            </div>
        </li>
        <li class="offers__card">
            <div class="offers__card-image tax"></div>
            <div class="offers__card-content">
                <p class="offers__card-description">Discounts on many items</p>
            </div>
        </li>
    </ul>
</section>
<section class="services">
    <header class="services__header">
        <h1 class="services__headline headings">Services for your convenience</h1>
    </header>
    <ul class="services__list">
        <li class="services__card services__card_hover">
            <div class="services__card-image map-marker-icon"></div>
            <div class="services__card-content">
                <h1 class="offers__card-description">
                    <span class="services__title">Branches and ATMs</span>
                    <span class="services__subtitle">Choose the nearest branch of the bank</span>
                </h1>
            </div>
        </li>
        <li class="services__card services__card_hover">
            <div class="services__card-image euro-icon"></div>
            <div class="services__card-content">
                <h1 class="offers__card-description">
                    <span class="services__title">Exchange rates</span>
                    <span class="services__subtitle">Find out about the latest changes in the exchange rate</span>
                </h1>
            </div>
        </li>
        <li class="services__card services__card_hover">
            <div class="services__card-image paper-plan-icon"></div>
            <div class="services__card-content">
                <h1 class="offers__card-description">
                    <span class="services__title">Money transfers</span>
                    <span class="services__subtitle">Transfer money quickly and without commissions</span>
                </h1>
            </div>
        </li>
        <li class="services__card services__card_hover">
            <div class="services__card-image gift-icon"></div>
            <div class="services__card-content">
                <h1 class="offers__card-description">
                    <span class="services__title">Loyalty program</span>
                    <span class="services__subtitle">Accumulate bonuses and get privileges</span>
                </h1>
            </div>
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
                <a href="../index.php?page=loans" class="footer__link footer__link_hover footer__link_focus">Loans</a>
            </li>
            <li class="footer__item">
                <a href="../index.php?page=deposits" class="footer__link footer__link_hover footer__link_focus">Deposits</a>
            </li>
            <li class="footer__item">
                <a href="../index.php?page=company" class="footer__link footer__link_hover footer__link_focus">About us</a>
            </li>
            <li class="footer__item">
                <a href="../index.php?page=profile" class="footer__link footer__link_hover footer__link_focus">Profile</a>
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
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Web resource for Certia Bank">
    <meta name="keywords" content="about us, certia, Bank, About us, Certia">
    <meta name="author" content="Ilya Shepelev">
    <meta name="copyright" content="Ilya Shepelev">
    <meta name="publisher" content="Ilya Shepelev">
    <meta name="robots" content="all">
    <title>About us</title>
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/sass/global.css">
    <link rel="stylesheet" href="../assets/sass/styles/company.css">
    <script src="../static/scripts/search.js" defer></script>
    <script src="../static/scripts/dropdown-toggle.js" defer></script>
</head>
<body>
<header class="header">
    <nav class="header__nav">
        <a href="../index.php?page=home" class="header__logo" title="Logo"></a>
        <ul class="header__list">
            <li class="header__item">
                <button class="header__btn header__btn_hover header__btn_focus header__btn_search btn" title="Search"></button>
            </li>
            <li class="header__item dropdown">
                <button class="header__btn header__dropdown-btn header__btn_hover header__btn_focus header__btn_burger btn" title="Menu"></button>
                <div class="dropdown__content">
                    <ul class="dropdown__list">
                        <li class="dropdown__item">
                            <a href="../index.php?page=home" class="dropdown__link dropdown__link_focus dropdown__link_hover">
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
                            <a href="#" class="dropdown__link dropdown__link_focus dropdown__link_hover dropdown__link_active">
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
                                <a href="../index.php?page=admin-panel&section=dashboard" class="dropdown__link dropdown__link_focus dropdown__link_hover">
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
<section class="about-us">
    <header class="about-us__header">
        <h1 class="about-us__headline headings">A little about our</h1>
    </header>
    <div class="about-us__hero">
        <p class="about-us__description">Our bank focuses on the technological process. Our team is working hard to add
            the best amenities for you.

            The speed of our work is achieved by automating almost all routine business processes, by introducing the
            maximum number of technologies into our product. </p>
        <div class="about-us__image"></div>
    </div>
    <div class="about-us__circle"></div>
    <div class="filials">
        <header class="filials__header">
            <h2 class="filials__headline">
                <span class="filials__title">Where are we?</span>
                <span class="filials__subtitle">Below you can find an interactive map of our affiliated societies</span>
            </h2>
        </header>
        <ul class="filials__list">
            <li class="filials__item">
                <h2 class="filials__street">Wall Street</h2>
                <p class="filials__address">57 Wall St, New York, NY 10005, USA</p>
                <p class="filials__time">Time: 9AM-21PM </p>
            </li>
            <li class="filials__item">
                <h2 class="filials__street">Park Place</h2>
                <p class="filials__address">101 Church St, New York, NY 10007, USA</p>
                <p class="filials__time">Time: 9AM-21PM </p>
            </li>
            <li class="filials__item">
                <h2 class="filials__street">Murray St</h2>
                <p class="filials__address">111 Murray St , New York, NY 10007, USA</p>
                <p class="filials__time">Time: 9AM-21PM </p>
            </li>
        </ul>
        <div class="filials__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d673.627529545747!2d-74.01025439106593!3d40.70733003807744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a1710b6a0a1%3A0x277c2e31942cde8f!2sSamuel%20Eber%20Law%20Office%3A%20Eber%20Samuel!5e0!3m2!1sen!2sus!4v1654583451256!5m2!1sen!2sus"
                    width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="footer__menu">
        <div class="footer__logo"></div>
        <ul class="footer__list">
            <li class="footer__item">
                <a href="../index.php?page=home" class="footer__link footer__link_hover footer__link_focus">Home</a>
            </li>
            <li class="footer__item">
                <a href="../index.php?page=loans" class="footer__link footer__link_hover footer__link_focus">Loans</a>
            </li>
            <li class="footer__item">
                <a href="../index.php?page=deposits" class="footer__link footer__link_hover footer__link_focus">Deposits</a>
            </li>
            <li class="footer__item">
                <a href="#" class="footer__link footer__link_hover footer__link_focus">About us</a>
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
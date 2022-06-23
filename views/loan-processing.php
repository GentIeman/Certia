<?php
include("../modules/current_session.php");
$user = $_SESSION["user"];
?>
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
    <title>Loan processing</title>
    <link rel="stylesheet" href="../assets/stylus/processing.css">
    <link rel="stylesheet" href="../assets/stylus/base.css">
    <link rel="stylesheet" href="../assets/stylus/global.css">
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <script src="../static/scripts/search.js" defer></script>
    <script src="../static/scripts/modal.js" defer></script>
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
                        <li class="dropdown__item dropdown__item_focus dropdown__item_hover">
                            <span class="dropdown__icon pyramid-icon"></span>
                            <a href="./deposits.php" class="dropdown__link">Deposits</a>
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
<section class="processing">
    <header class="processing__header">
        <h1 class="processing__headline headings">Loan processing</h1>
    </header>
    <div class="user-data">
        <header class="user-data__header">
            <h2 class="user-data__headline">User info</h2>
        </header>
        <ul class="user-data__list">
            <li class="user-data__item">
                <p class="user-data__content">Ilya Shepelev</p>
                <span class="user-data__subtitle">Username</span>
            </li>
            <li class="user-data__item">
                <p class="user-data__content">3000$</p>
                <span class="user-data__subtitle">* 1234</span>
            </li>
            <li class="user-data__item">
                <p class="user-data__content">2000 $</p>
                <span class="user-data__subtitle">* 5678</span>
            </li>
        </ul>
    </div>
    <form class="form-registration form-submit">
        <header class="form-registration__header">
            <h2 class="form-registration__headline">Credit form</h2>
        </header>
        <ul class="form-registration__list">
            <li class="form-registration__item">
                <h3 class="form-registration__subtitle">Loan details</h3>
                <div class="loan-data">
                    <label class="loan-data__label">
                        <input type="text" class="loan-data__input" disabled value="4000$">
                    </label>
                    <span class="loan-data__under">under</span>
                    <p class="loan-data__percent">5,6%
                        <span class="loan-data__subtitle">percent</span>
                    </p>
                </div>
            </li>
            <li class="form-registration__item">
                <h3 class="form-registration__subtitle">Period</h3>
                <p class="form-registration__time">31/05/2022 - 31/05/2023 (365 years)</p>
            </li>
            <li class="form-registration__item">
                <h3 class="form-registration__subtitle">Select card</h3>
                <label class="form-registration__label">
                    <input type="text" list="cards"
                           class="form-registration__select-card form-registration__select-card_hover form-registration__select-card_focus"
                           required>
                </label>
                <datalist id="cards">
                    <option value="* 1234">3000$</option>
                    <option value="* 5678">5000$</option>
                </datalist>
            </li>
        </ul>
        <div class="agreement">
            <label class="agreement__checkbox-wrap agreement__checkbox-wrap_hover agreement__checkbox-wrap_focus">
                <input type="checkbox" class="agreement__checkbox" required>
                <span class="agreement__checkbox-icon"></span>
            </label>
            <p class="agreement__content">I agree with the <span class="agreement__content_accent-color">company's policies</span>
                and <span class="agreement__content_accent-color">requirements</span></p>
        </div>
        <button class="form-registration__btn form-registration__btn_hover form-registration__btn_focus open-modal">
            Checkout
        </button>
    </form>
</section>
<dialog class="modal reference-modal">
    <div class="reference-modal__container modal__container_grid">
        <header class="reference-modal__header">
            <h3 class="reference-modal__headline">Loan reference</h3>
        </header>
        <ul class="reference-modal__list">
            <li class="reference-modal__item">
                <h3 class="reference-modal__subtitle">Loan details</h3>
                <div class="loan-data">
                    <label class="loan-data__label">
                        <input type="text" class="loan-data__input" disabled value="4000$">
                    </label>
                    <span class="loan-data__under">under</span>
                    <p class="loan-data__percent">5,6%
                        <span class="loan-data__subtitle">percent</span>
                    </p>
                </div>
            </li>
            <li class="reference-modal__item">
                <h3 class="reference-modal__subtitle">Period</h3>
                <p class="reference-modal__time">31/05/2022 - 31/05/2023 (365 years)</p>
            </li>
            <li class="reference-modal__item">
                <h3 class="reference-modal__subtitle">Selected card</h3>
                <label class="reference-modal__label">
                    <input type="text" class="deposit-data__input" value="* 1234" disabled>
                </label>
            </li>
        </ul>
        <div class="reference-modal__image check"></div>
    </div>
</dialog>
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
                <a href="./deposits.php" class="footer__link footer__link_hover footer__link_focus">Deposits</a>
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
<?php
$plan = R::load("plans", $_GET["plan_id"]);
$current_date = date("m/d/Y");
$end_date = date_format(date_add(new DateTime(), new DateInterval("P" . $plan->term . "D")), "m/d/Y");
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
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/sass/styles/processing.css">
    <link rel="stylesheet" href="../assets/sass/global.css">
    <script src="../static/scripts/search.js" defer></script>
    <script src="../static/scripts/field-validation.js" defer></script>
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
                        <li class="dropdown__item">
                            <a href="loans.php" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                <span class="dropdown__icon money-icon"></span>
                                Credits
                            </a>
                        </li>
                        <li class="dropdown__item">
                            <a href="./deposits.php" class="dropdown__link dropdown__link_focus dropdown__link_hover">
                                <span class="dropdown__icon pyramid-icon"></span>
                                Deposits
                            </a>
                        </li>
                        <li class="dropdown__item">
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
                <p class="user-data__content"><?php echo $client["fullname"] ?></p>
                <span class="user-data__subtitle">Username</span>
            </li>
            <?php foreach ($client->ownBankaccountsList as $account): ?>
                <li class="user-data__item">
                    <p class="user-data__content"><?php echo $account["id"] ?></p>
                    <span class="user-data__subtitle">account number</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <form class="form-registration" method="post"
          action="index.php?section=new-account&plan_id=<?php echo $plan["id"] ?>">
        <header class="form-registration__header">
            <h2 class="form-registration__headline">Credit form</h2>
        </header>
        <ul class="form-registration__list">
            <li class="form-registration__item">
                <h3 class="form-registration__subtitle">Loan details</h3>
                <div class="loan-data">
                    <label class="loan-data__label">
                        <input type="text" class="loan-data__input" disabled value="<?php echo $plan["amount"] ?>$">
                    </label>
                    <span class="loan-data__under">for</span>
                    <p class="loan-data__percent"><?php echo $plan["percent"] ?>%
                        <span class="loan-data__subtitle">percent</span>
                    </p>
                </div>
            </li>
            <li class="form-registration__item">
                <h3 class="form-registration__subtitle">Period</h3>
                <p class="form-registration__time">
                    <?php echo $current_date ?> - <?php echo $end_date ?>(<?php echo $plan->term ?>days)
                </p>
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
        <button type="submit"
                class="form-registration__btn form-registration__btn_hover form-registration__btn_focus open-modal"
                onclick="trySendData('form-registration', 'new-account&plan_id=<?php echo $plan["id"] ?>', 'loan-processing.php?plan_id=<?php echo $plan["id"] ?>', null, 'reference-modal')">
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
                        <input type="text" class="loan-data__input" disabled value="<?php echo $plan["amount"] ?>$">
                    </label>
                    <span class="loan-data__under">for</span>
                    <p class="loan-data__percent"><?php echo $plan["percent"] ?>%
                        <span class="loan-data__subtitle">percent</span>
                    </p>
                </div>
            </li>
            <li class="reference-modal__item">
                <h3 class="reference-modal__subtitle">Period</h3>
                <p class="reference-modal__time">
                    <?php echo $current_date ?> - <?php echo $end_date ?>
                    (<?php echo $plan->term ?>days)
                </p>
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
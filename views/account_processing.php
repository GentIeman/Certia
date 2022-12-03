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
    <title>Account processing</title>
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/sass/styles/processing.css">
    <link rel="stylesheet" href="../assets/sass/global.css">
    <script src="../static/scripts/search.js" defer></script>
    <script src="../static/scripts/field-validation.js" defer></script>
    <script src="../static/scripts/dropdown-toggle.js" defer></script>
    <script src="../static/scripts/checking-card-reference.js" defer></script>
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
<section class="processing">
    <header class="processing__header">
        <h1 class="processing__headline headings">Account processing</h1>
    </header>
    <form class="form-registration" method="post" action="../index.php?page=account-processing&action=open-account&plan_id=<?php echo $plan["id"] ?>">
        <header class="form-registration__header">
            <h2 class="form-registration__headline">Account opening form</h2>
        </header>
        <ul class="form-registration__list">
            <li class="form-registration__item">
                <?php if($plan->plan_type == "Loan"):?>
                    <h3 class="form-registration__subtitle">Loan details</h3>
                <?php else: ?>
                    <h3 class="form-registration__subtitle">Deposit details</h3>
                <?php endif; ?>
                <div class="account-data">
                    <label class="account-data__label">
                        <input type="text" class="account-data__input" disabled value="<?php echo $plan["plan_amount"] ?>$">
                    </label>
                    <?php if ($plan->plan_type == "Loan"): ?>
                        <span class="account-data__under">for</span>
                        <p class="account-data__percent"><?php echo $plan["plan_percent"] ?>%
                            <span class="account-data__subtitle">percent</span>
                        </p>
                    <?php endif; ?>
                </div>
            </li>
            <li class="form-registration__item">
                <p class="form-registration__account-type">Type:
                    <span class="form-registration__account-type_accent-color"><?php echo $plan["plan_type"] ?></span>
                </p>
            </li>
            <?php if ($plan["plan_type"] != "Loan"): ?>
                <?php foreach ($debit_accounts as $account): ?>
                    <?php if ($account["balance"] > $plan["plan_amount"] && $account["plan"] === NULL): ?>
                        <li class="form-registration__item">
                            <h3 class="form-registration__subtitle">Select card</h3>
                            <label class="form-registration__label">
                                <select class="form-registration__select form-registration__select_hover form-registration__select_focus" name="selected-card" required>
                                    <option disabled>
                                        Select card
                                    </option>
                                        <?php foreach ($client_cards as $card): ?>
                                            <?php if ($card["accounts_id"] == $account["id"] && $account["balance"] > $plan["plan_amount"]): ?>
                                                <option value="<?php echo $card["id"] ?>">
                                                    <?php echo $card["card_system"] ?> * <?php echo substr($card["card_number"], -4) ?> <?php echo $account["balance"]?>$
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                </select>
                            </label>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <li class="form-registration__item">
                <h3 class="form-registration__subtitle">Period</h3>
                <p class="form-registration__time">
                    <?php echo $current_date ?> - <?php echo $end_date ?> (<?php echo $plan->plan_term ?> days)
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
        <?php if ($plan["plan_type"] != "Loan"): ?>
            <?php foreach($debit_accounts as $account): ?>
                <?php if ($account["balance"] > $plan["plan_amount"]): ?>
                    <button class="form-registration__btn btn btn_hover btn_focus" type="submit">Open account</button>
                <?php else: ?>
                    <p class="form-registration__hint">You don't want to open this account. Not enough money</p>
                    <a href="../index.php?page=<?php echo ($plan["plan_type"] == "Loan" ? "loans" : "deposits")?>" class="form-registration__link link form-registration__link_hover form-registration__link_focus">
                        Back
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <button class="form-registration__btn btn form-registration__btn_hover form-registration__btn_focus" type="submit">Open account</button>
        <?php endif; ?>
    </form>
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
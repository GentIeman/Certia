<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Web resource for Certia Bank">
    <meta name="author" content="Ilya Shepelev">
    <meta name="copyright" content="Ilya Shepelev">
    <meta name="publisher" content="Ilya Shepelev">
    <meta name="robots" content="all">
    <title>Account info</title>
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/sass/styles/info.css">
    <link rel="stylesheet" href="../assets/sass/global.css">
    <script src="../static/scripts/search.js" defer></script>
    <script src="../static/scripts/open-modal.js" defer></script>
    <script src="../static/scripts/field-validation.js" defer></script>
    <script src="../static/scripts/dropdown-toggle.js" defer></script>
</head>
<body class="page">
<header class="page__header header">
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
                        <?php if (isset($_SESSION["user"]) === true && $_SESSION["user"]->role == "admin"): ?>
                            <li class="dropdown__item">
                                <a href="../index.php?page=admin" class="dropdown__link dropdown__link_focus dropdown__link_hover">
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
<section class="page__info info">
    <header class="info__header">
        <h1 class="info__headline headings">Account info</h1>
    </header>
    <div class="card-container">
        <div class="info__card card">
            <header class="card__header">
                <?php if (isset($plan) === true && $plan->plan_type == "Loan"): ?>
                    <h2 class="card__headline">Loan account</h2>
                <?php elseif (isset($plan) === true && $plan->plan_type !== "Loan"): ?>
                    <h2 class="card__headline">Deposit account</h2>
                <?php else: ?>
                    <h2 class="card__headline">Debit Account</h2>
                <?php endif ?>
            </header>
            <ul class="card__list">
                <li class="card__item">
                    <p class="card__text">Account number: <?php echo $account["account_number"]?></p>
                </li>
                <li class="card__item">
                    <p class="card__text">Balance: <?php echo $account["account_balance"]?> $</p>
                </li>
                <?php if ($account["account_debt"] > 0): ?>
                    <li class="card__item">
                        <p class="card__text">Debt: <?php echo $account["account_debt"]?></p>
                    </li>
                <?php endif; ?>
                <li class="card__item">
                    <p class="card__text">Opening date: <?php echo $opening_date ?></p>
                </li>
                <?php if (isset($actual_closing_date)):?>
                    <li class="card__item">
                        <p class="card__text">Actual closing date: <?php echo $actual_closing_date ?></p>
                    </li>
                <?php endif; ?>
                <?php if (isset($closing_date)) :?>
                    <li class="card__item">
                        <p class="card__text">Closing date: <?php echo $closing_date ?></p>
                    </li>
                <?php endif; ?>
                <li class="card__item">
                    <p class="card__text">Status: <?php echo $account_status ?></p>
                </li>
                <li class="card__item card__item_border-top">
                    <p class="card__text">Card system: <?php echo $card["card_system"] ?></p>
                </li>
                <li class="card__item">
                    <p class="card__text">Card number: <?php echo $card["card_number"] ?></p>
                </li>
                <li class="card__item">
                    <p class="card__text">Card cvv: <?php echo $card["card_cvv"] ?></p>
                </li>
                <li class="card__item">
                    <p class="card__text">Card validity date: <?php echo $card_validity_date?></p>
                </li>
                <?php if (isset($plan) === true): ?>
                    <li class="card__item card__item_border-top">
                        <p class="card__text">Plan: <?php echo $plan["plan_name"] ?></p>
                    </li>
                    <?php if ($plan["plan_percent"]): ?>
                        <li class="card__item">
                            <p class="card__text">Percent: <?php echo $plan["plan_percent"] ?> %</p>
                        </li>
                    <?php endif; ?>
                    <li class="card__item">
                        <p class="card__text">Term: <?php echo $plan["plan_term"] ?> days</p>
                    </li>
                <?php endif;?>
            </ul>
            <footer class="card__footer">
                <a href="../index.php?page=profile" class="card__link card__link_hover card__link_focus">Back to profile</a>
                <?php if(isset($plan) === true && ($plan->plan_type == "Deposit")): ?>
                    <a href="#" class="card__link card__link_danger card__link_hover card__link_focus">Closing account</a>
                <?php endif; ?>
            </footer>
        </div>
    </div>
    <div class="card-container">
        <div class="transactions-history">
            <header class="transaction-history__header">
                <h2 class="transaction-history__subtitle">History</h2>
            </header>
            <table class="transactions-history__table table">
                <thead class="table__thead">
                    <tr class="table__row">
                        <th class="table__head">client</th>
                        <th class="table__head">amount</th>
                        <th class="table__head">date</th>
                        <th class="table__head">type</th>
                    </tr>
                </thead>
                <tbody class="table__tbody">
                <?php foreach ($activity as $active): ?>
                    <tr class="table__row table__row_hover">
                        <td class="table__cell"><?php echo $active["client"] ?></td>
                        <td class="table__cell"><?php echo $active["direction"]?><?php echo $active["amount"] ?>$</td>
                        <td class="table__cell">* <?php echo substr($active["card"], -4) ?></td>
                        <td class="table__cell"><?php echo $active["date"] ?></td>
                        <td class="table__cell"><?php echo $active["type"] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<footer class="page__footer footer">
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
                <a href="#" class="footer__link footer__link_hover footer__link_focus">Profile</a>
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
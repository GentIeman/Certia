<?php
include("../modules/current_session.php");
$plans = R::findAll("plans");
$accounts = R::getAll("SELECT * FROM clientsbankaccounts");
$clients = R::findAll("clients");
$feedbacks = R::findAll("feedbacks")
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
    <title>Dashboards</title>
    <link rel="stylesheet" href="../assets/stylus/admin.css">
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
                        <?php if (isset($_SESSION["user"]) === true && $_SESSION["user"]->role == "admin"): ?>
                            <li class="dropdown__item dropdown__item_focus dropdown__item_hover dropdown__item_active">
                                <span class="dropdown__icon admin-icon"></span>
                                <a href="#" class="dropdown__link">Admin</a>
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
            <button class="search__btn search__btn_hover search__btn_focus btn btn_background search-wt-icon"
                    title="Search"></button>
        </div>
        <div class="results">
            <ul class="results__list">
            </ul>
        </div>
    </div>
</div>
<section class="admin">
    <header class="admin__header">
        <h1 class="admin__headline headings">Admin Dashboard</h1>
    </header>
    <div class="plans admin__section">
        <h2 class="admin__subtitle">Plans</h2>
        <div class="admin__table">
            <ul class="admin__table-row">
                <li class="admin__table-subtitle">name</li>
                <li class="admin__table-subtitle">description</li>
                <li class="admin__table-subtitle">percent</li>
                <li class="admin__table-subtitle">amount</li>
                <li class="admin__table-subtitle">term</li>
                <li class="admin__table-subtitle">type</li>
            </ul>
            <?php foreach ($plans as $plan): ?>
                <ul class="admin__table-row admin__table-row_hover">
                    <li class="admin__table-data"><?php echo $plan["name"] ?></li>
                    <li class="admin__table-data"><?php echo ($plan["description"] === NULL) ? "-" : $plan["description"] ?></li>
                    <li class="admin__table-data"><?php echo ($plan["percent"] === NULL) ? "-" : $plan["percent"] . " %" ?></li>
                    <li class="admin__table-data"><?php echo $plan["amount"] ?>$</li>
                    <li class="admin__table-data"><?php echo $plan["term"] ?> days</li>
                    <li class="admin__table-data"><?php echo $plan["type"] ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="accounts admin__section">
        <h2 class="admin__subtitle">Accounts</h2>
        <div class="admin__table">
            <ul class="admin__table-row">
                <li class="admin__table-subtitle">fullname</li>
                <li class="admin__table-subtitle">phone</li>
                <li class="admin__table-subtitle">amount</li>
                <li class="admin__table-subtitle">type</li>
                <li class="admin__table-subtitle">percent</li>
                <li class="admin__table-subtitle">opening date</li>
                <li class="admin__table-subtitle">closing date</li>
                <li class="admin__table-subtitle">status</li>

            </ul>
            <?php foreach ($accounts as $account): ?>
                <ul class="admin__table-row admin__table-row_hover">
                    <li class="admin__table-data"><?php echo $account["Fullname"] ?></li>
                    <li class="admin__table-data"><?php echo $account["Phone"] ?></li>
                    <li class="admin__table-data"><?php echo $account["AmountAccount"] ?>$</li>
                    <li class="admin__table-data"><?php echo $account["AccountType"] ?></li>
                    <li class="admin__table-data"><?php echo ($account["Percent"] === NULL) ? "-" : $account["Percent"] . " %" ?></li>
                    <li class="admin__table-data"><?php echo $account["OpeningDate"] ?></li>
                    <li class="admin__table-data"><?php echo $account["ClosingDate"] ?> days</li>
                    <li class="admin__table-data"><?php echo $account["Status"] ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="clients admin__section">
        <h2 class="admin__subtitle">Clients</h2>
        <div class="admin__table">
            <ul class="admin__table-row">
                <li class="admin__table-subtitle">fullname</li>
                <li class="admin__table-subtitle">address</li>
                <li class="admin__table-subtitle">phone</li>
                <li class="admin__table-subtitle">email</li>
                <li class="admin__table-subtitle">birthday</li>
                <li class="admin__table-subtitle">gender</li>
                <li class="admin__table-subtitle">role</li>
            </ul>
            <?php foreach ($clients as $client): ?>
                <ul class="admin__table-row admin__table-row_hover">
                    <li class="admin__table-data"><?php echo $client["fullname"] ?></li>
                    <li class="admin__table-data"><?php echo $client["address"] ?></li>
                    <li class="admin__table-data"><?php echo $client["phone"] ?></li>
                    <li class="admin__table-data"><?php echo $client["email"] ?></li>
                    <li class="admin__table-data"><?php echo $client["birthday"] ?></li>
                    <li class="admin__table-data"><?php echo $client["gender"] ?></li>
                    <li class="admin__table-data"><?php echo $client["role"] ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="feedbacks admin__section">
        <h2 class="admin__subtitle">Feedbacks</h2>
        <div class="admin__table">
            <ul class="admin__table-row">
                <li class="admin__table-subtitle">username</li>
                <li class="admin__table-subtitle">email</li>
                <li class="admin__table-subtitle">phone</li>
                <li class="admin__table-subtitle">content</li>
            </ul>
            <?php foreach ($feedbacks as $feedback): ?>
                <ul class="admin__table-row admin__table-row_hover">
                    <li class="admin__table-data"><?php echo $feedback["username"] ?></li>
                    <li class="admin__table-data"><?php echo $feedback["email"] ?></li>
                    <li class="admin__table-data"><?php echo $feedback["phone"] ?></li>
                    <li class="admin__table-data"><?php echo $feedback["content"] ?></li>
                </ul>
            <?php endforeach; ?>
        </div>

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
    <p class="footer__slogan">Certia - convenient everywhere and in everything</p>
</footer>
</body>
</html>
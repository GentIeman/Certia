<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Web resource for Certia Bank">
    <meta name="keywords" content="profile, certia, Bank, Profile, Certia">
    <meta name="author" content="Ilya Shepelev">
    <meta name="copyright" content="Ilya Shepelev">
    <meta name="publisher" content="Ilya Shepelev">
    <meta name="robots" content="all">
    <title>Profile</title>
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/sass/styles/profile.css">
    <link rel="stylesheet" href="../assets/sass/global.css">
    <script src="../static/scripts/search.js" defer></script>
    <script src="../libs/inputmask.js" defer></script>
    <script src="../static/scripts/open-modal.js" defer></script>
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
                                <a href="#" class="dropdown__link dropdown__link_focus dropdown__link_hover dropdown__link_active">
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
<section class="profile">
    <header class="profile__header">
        <h1 class="profile__headline headings">Profile</h1>
    </header>
    <div class="user-card">
        <div class="user-card__avatar-wrap">
            <img src="../static/icons/user-wt.svg" alt="Avatar" class="user-card__avatar" width="100" height="100">
        </div>
        <ul class="user-card__list">
            <li class="user-card__item">
                <p class="user-card__title user-card__title_bold"><?php echo $fullname ?></p>
                <span class="user-card__subtitle">fullname</span>
            </li>
            <li class="user-card__item">
                <p class="user-card__title"><?php echo $client_birthdate ?></p>
                <span class="user-card__subtitle">birthday</span>
            </li>
            <li class="user-card__item">
                <p class="user-card__title"><?php echo $client["client_email"] ?></p>
                <span class="user-card__subtitle">email</span>
            </li>
            <li class="user-card__item">
                <p class="user-card__title"><?php echo $client["client_phone"] ?></p>
                <span class="user-card__subtitle">phone</span>
            </li>
            <li class="user-card__item">
                <p class="user-card__title"><?php echo $client_address ?></p>
                <span class="user-card__subtitle">address</span>
            </li>
        </ul>
    </div>
    <section class="cards">
        <header class="cards__header">
            <h1 class="cards__headline">Cards</h1>
        </header>
        <ul class="cards__list">
            <?php foreach ($client_cards as $card): ?>
                <li class="cards__item">
                    <a href="../index.php?page=account-info&card_id=<?php echo $card["id"] ?>" class="card card_hover card_focus">
                        <div class="card__icon"></div>
                        <p class="card__system"><?php echo $card["card_system"] ?>
                            <span class="card__number">
                                * <?php echo substr($card["card_number"], -4) ?>
                            </span>
                        </p>
                        <p class="card__balance">
                            <?php foreach ($accounts as $account): ?>
                                <?php if ($account["id"] == $card["accounts_id"]): ?>
                                    <?php echo $account["account_balance"] ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        $</p>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="operation">
        <header class="operation__header">
            <h1 class="operation__headline">Operation</h1>
        </header>
        <ul class="operation__list">
            <li class="operation__item">
                <button class="operation__btn operation__btn-transfer operation__btn_hover operation__btn_focus"
                        onclick="showModal('transfer-modal')">
                    Transfer to a person
                </button>
            </li>
        </ul>
    </section>
    <section class="activity">
        <header class="activity__header">
            <h2 class="activity__headline">Activity</h2>
        </header>
        <?php if (!$activity): ?>
            <p class="activity__plug">Not activity</p>
        <?php else: ?>
        <table class="activity__table table">
            <thead class="table__thead">
                <tr class="table__row">
                    <th class="table__head">client</th>
                    <th class="table__head">amount</th>
                    <th class="table__head">card</th>
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
        <?php endif; ?>
    </section>
    <section class="feedback">
        <h2 class="feedback__content">You liked the level of our work, or you have any suggestions?
            Then you can leave your feedback by filling out a special form</h2>
        <a href="../index.php?page=feedback" class="feedback__link feedback__link_hover feedback__link_focus">Feedback</a>
    </section>
</section>
<dialog class="modal transfer-modal">
    <div class="transfer-modal__container">
        <header class="transfer-modal__header">
            <h3 class="transfer-modal__headline">Transfer to another account</h3>
        </header>
        <form class="transfer-modal__form" method="post" action="../index.php?page=profile&action=transaction">
            <label class="transfer-modal__label">
                <select class="transfer-modal__select transfer-model__client-card transfer-modal__select_hover transfer-modal__select_focus" oninput="checkingCard(this)" name="selected-card" required>
                    <option value="0" selected disabled>Choose a card</option>
                        <?php foreach ($client_cards as $card): ?>
                            <?php foreach ($accounts as $account): ?>
                                <?php if ($account["id"] == $card["accounts_id"]): ?>
                                    <option value="<?php echo $card["card_number"] ?>">
                                        <?php echo $card["card_system"] ?> * <?php echo substr($card["card_number"], -4) ?> <?php echo $account["account_balance"]?>$
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                </select>
            </label>
            <label class="transfer-modal__label">
                <input type="text" name="recipient-card" class="transfer-modal__input transfer-model__recipient-card transfer-modal__input-to transfer-modal__input_hover transfer-modal__input_focus" placeholder="Recipient's card number" oninput="checkingCard(this)" required>
            </label>
            <label class="transfer-modal__label">
                <input type="number" min="50" max="10000" name="amount" class="transfer-modal__input transfer-modal__input_hover transfer-modal__input_focus transfer-modal__input_amount" placeholder="Amount" oninput="onlyNumber(this)" required>
            </label>
            <button type="submit" class="transfer-modal__btn transfer-modal__btn_hover transfer-modal__btn_focus open-tooltip ">
                Transfer
            </button>
        </form>
    </div>
</dialog>
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
<?php
require_once("../modules/current_session.php");
if (!$client) header("Location:signin.php");
require_once("../modules/clients/check_avatar.php");
require_once("../modules/clients/client_info.php");
require_once("../modules/clients/check_debting.php");
require_once("../modules/clients/movements.php");
?>
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
    <link rel="stylesheet" href="../assets/stylus/profile.css">
    <link rel="stylesheet" href="../assets/stylus/base.css">
    <link rel="stylesheet" href="../assets/stylus/global.css">
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <script src="../static/scripts/search.js" defer></script>
    <script src="../static/scripts/openModal.js" defer></script>
    <script src="../static/scripts/theme.js" defer></script>
    <script src="../static/scripts/changeFileName.js" defer></script>
    <script src="../static/scripts/errorChecker.js" defer></script>
    <script src="../static/scripts/inputValidation.js" defer></script>
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
                            <li class="dropdown__item dropdown__item_focus dropdown__item_hover dropdown__item_active">
                                <span class="dropdown__icon user-icon"></span>
                                <a href="#" class="dropdown__link">Profile</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION["user"]) === true && $_SESSION["user"]->role == "admin"): ?>
                            <li class="dropdown__item dropdown__item_focus dropdown__item_hover">
                                <span class="dropdown__icon admin-icon"></span>
                                <a href="./admin.php" class="dropdown__link">Admin</a>
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
<section class="profile">
    <header class="profile__header">
        <h1 class="profile__headline headings">Profile</h1>
    </header>
    <div class="user-card">
        <div class="user-card__avatar-wrap" onclick="showModal('update-avatar')">
            <img src="../static/<?php echo $pathToAvatar ?>" alt="Avatar" class="user-card__avatar" width="100"
                 height="100">
        </div>
        <ul class="user-card__list">
            <li class="user-card__item">
                <p class="user-card__title user-card__title_bold"><?php echo $client["fullname"] ?></p>
                <span class="user-card__subtitle">username</span>
            </li>
            <li class="user-card__item">
                <p class="user-card__title"><?php echo $client["email"] ?></p>
                <span class="user-card__subtitle">email</span>
            </li>
            <li class="user-card__item">
                <p class="user-card__title"><?php echo $client["phone"] ?></p>
                <span class="user-card__subtitle">phone</span>
            </li>
            <li class="user-card__item">
                <p class="user-card__title"><?php echo $client["address"] ?></p>
                <span class="user-card__subtitle">address</span>
            </li>
            <li class="user-card__item">
                <?php if ($summ < 0): ?>
                    <p class="user-card__title user-card__title_red"> <?php echo $summ ?></p>


                    <span class="user-card__subtitle">debt</span>
                <?php else : ?>
                    <p class="user-card__title user-card__title"> <?php echo $summ ?></p>
                    <span class="user-card__subtitle">balance</span>
                <?php endif; ?>
            </li>
            <?php foreach ($client->ownBankaccountsList as $account): ?>
                <li class="user-card__item">
                    <p class="user-card__title"><?php echo $account["id"] ?></p>
                    <span class="user-card__subtitle">account number</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <section class="cards">
        <header class="cards__header">
            <h2 class="cards__headline">Cards</h2>
        </header>
        <ul class="cards__list">
            <?php foreach ($client_cards as $card): ?>
                <li class="cards__item">
                    <div class="card">
                        <div class="card__icon"></div>
                        <p class="card__type"><?php echo $card["CardName"] ?>
                            <span class="card__number">
                                * <?php echo substr($card["CardNumber"], -4) ?>
                            </span>
                        </p>
                        <p class="card__balance"><?php echo $card["AmountAccount"] ?>$</p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="operation">
        <header class="operation__header">
            <h2 class="operation__headline">Operation</h2>
        </header>
        <ul class="operation__list">
            <li class="operation__item">
                <button class="operation__btn operation__btn-transfer operation__btn_hover operation__btn_focus"
                        onclick="showModal('transfer-modal')">
                    Transfer to a person
                </button>
            </li>
            <?php if ($credits > 0): ?>
                <li class="operation__item">
                    <button class="operation__btn operation__btn-loan operation__btn_hover operation__btn_focus"
                            onclick="showModal('loan-info')">
                        Loan status
                    </button>
                </li>
            <?php endif;
            if ($deposits > 0): ?>
                <li class="operation__item">
                    <button class="operation__btn operation__btn-deposit operation__btn_hover operation__btn_focus"
                            onclick="showModal('deposit-info')">
                        Deposit status
                    </button>
                </li>
            <?php endif; ?>
        </ul>
    </section>
    <section class="activity">
        <header class="activity__header">
            <h2 class="activity__headline">Activity</h2>
        </header>
        <?php if (!$movements): ?>
            <p class="activity__plug">Not activity</p>
        <?php else: ?>
            <div class="activity__table">
                <ul class="activity__table-row">
                    <li class="activity__table-subtitle">from</li>
                    <li class="activity__table-subtitle">to</li>
                    <li class="activity__table-subtitle">amount</li>
                    <li class="activity__table-subtitle">timestamp</li>
                </ul>
                <?php foreach ($movements as $move): ?>
                    <ul class="activity__table-row activity__table-row_hover">
                        <li class="activity__table-data"><?php echo $move["from"] ?></li>
                        <li class="activity__table-data"><?php echo $move["to"] ?></li>
                        <li class="activity__table-data">
                            <?php echo $move["direction"] . $move["amount"] ?>
                            $
                        </li>
                        <li class="activity__table-data">
                            <?php echo $move["timestamp"] ?>
                        </li>

                    </ul>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
    <section class="feedback">
        <h2 class="feedback__content">You liked the level of our work, or you have any suggestions?
            Then you can leave your feedback by filling out a special form</h2>
        <a href="./feedbacks.php" class="feedback__link feedback__link_hover feedback__link_focus">Feedback</a>
    </section>
</section>
<dialog class="modal transfer-modal">
    <div class="transfer-modal__container">
        <header class="transfer-modal__header">
            <h3 class="transfer-modal__headline">transfer to another account</h3>
        </header>
        <form class="transfer-modal__form" method="post"
              action="#">
            <label class="transfer-modal__label">
                <input type="text" list="card" name="card"
                       class="transfer-modal__input transfer-modal__input_hover transfer-modal__input_focus transfer-modal__input_card"
                       placeholder="Transfer from" pattern="[0-9]{4} *[0-9]{4} *[0-9]{4} *[0-9]{4}"
                       oninput="onlyNumber(this)"
                       maxlength="16" required>
                <datalist id="card">
                    <?php foreach ($client_cards as $card): ?>
                        <?php if ($card["AmountAccount"] > 0): ?>
                            <option value="<?php echo $card["CardNumber"] ?>"><?php echo $card["AmountAccount"] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </datalist>
            </label>
            <label class="transfer-modal__label">
                <input type="number" name="recipient" min="16"
                       class="transfer-modal__input transfer-modal__input_hover transfer-modal__input_focus transfer-modal__input_recipient"
                       placeholder="Recipient's card number" oninput="recipientValidation(this, 16)" required>
            </label>
            <label class="transfer-modal__label">
                <input type="number" min="50" max="10000" name="amount"
                       class="transfer-modal__input transfer-modal__input_hover transfer-modal__input_focus transfer-modal__input_amount"
                       placeholder="Amount" oninput="onlyNumber(this)" required>
            </label>
            <button type="submit"
                    onclick="trySendData('transfer-modal__form', 'transfer-money&user_id=<?php echo $client["id"] ?>', 'profile.php', 'transfer-modal', 'successful-transfer')"
                    class="transfer-modal__btn transfer-modal__btn_hover transfer-modal__btn_focus open-tooltip ">
                Transfer
            </button>
        </form>
    </div>
</dialog>
<dialog class="success-modal successful-transfer">
    <div class="success-modal__container">
        <span class="success-modal__icon check"></span>
        <p class="success-modal__content">Successful transfer</p>
    </div>
</dialog>
<dialog class="modal info-modal loan-info">
    <div class="info-modal__image"></div>
    <div class="info-modal__container">
        <header class="info-modal__header">
            <h3 class="info-modal__headline">Loans info</h3>
        </header>
        <table class="info-modal__table">
            <thead class="info-modal__table-head">
            <tr class="info-modal__table-row">
                <th class="info-modal__table-subtitle">account number</th>
                <th class="info-modal__table-subtitle">opening date</th>
                <th class="info-modal__table-subtitle">closing date</th>
                <th class="info-modal__table-subtitle">percent</th>
                <th class="info-modal__table-subtitle">status</th>
                <th class="info-modal__table-subtitle">type</th>
            </tr>
            </thead>
            <tbody class="info-modal__table-body">
            <?php foreach ($client_credits as $credit): ?>
                <tr class="info-modal__table-row info-modal__table-row_hover">
                    <td class="info-modal__table-data"><?php echo $credit["AccountId"] ?></td>
                    <td class="info-modal__table-data"><?php echo $credit["OpeningDate"] ?></td>
                    <td class="info-modal__table-data"><?php echo $credit["ClosingDate"] ?></td>
                    <td class="info-modal__table-data"><?php echo $credit["Percent"] ?></td>
                    <td class="info-modal__table-data"><?php echo $credit["Status"] ?></td>
                    <td class="info-modal__table-data info-modal_table-data_accent-color"><?php echo $credit["AccountType"] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</dialog>
<dialog class="modal info-modal deposit-info">
    <div class="info-modal__container">
        <header class="info-modal__header">
            <h3 class="info-modal__headline">Deposits info</h3>
        </header>
        <table class="info-modal__table">
            <thead class="info-modal__table-head">
            <tr class="info-modal__table-row">
                <th class="info-modal__table-subtitle">account number</th>
                <th class="info-modal__table-subtitle">opening date</th>
                <th class="info-modal__table-subtitle">closing date</th>
                <th class="info-modal__table-subtitle">status</th>
                <th class="info-modal__table-subtitle">type</th>
            </tr>
            </thead>
            <tbody class="info-modal__table-body">
            <?php foreach ($client_deposits as $deposit): ?>
                <tr class="info-modal__table-row info-modal__table-row_hover">
                    <td class="info-modal__table-data"><?php echo $deposit["AccountId"] ?></td>
                    <td class="info-modal__table-data"><?php echo $deposit["OpeningDate"] ?></td>
                    <td class="info-modal__table-data"><?php echo $deposit["ClosingDate"] ?></td>
                    <td class="info-modal__table-data"><?php echo $deposit["Status"] ?></td>
                    <td class="info-modal__table-data info-modal_table-data_accent-color"><?php echo $deposit["AccountType"] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</dialog>
<dialog class="modal update-avatar">
    <div class="update-avatar__container">
        <form class="update-avatar__form" method="post"
              action="#" enctype="multipart/form-data">
            <div class="update-avatar__content update-avatar__content_hover update-avatar__content_focus">
                <p class="update-avatar__subtitle">Choose file (.jpg)</p>
                <input type="file" name="avatar" class="update-avatar__input" accept=".jpg" required>
            </div>
            <button type="submit"
                    onclick="trySendData('update-avatar__form', 'update-avatar&user_id=<?php echo $client["id"] ?>', 'profile.php', 'update-avatar')"
                    class="update-avatar__btn update-avatar__btn_hover update-avatar__btn_focus">
                Update
            </button>
        </form>
    </div>
</dialog>
<div class="tooltip-wrap">
    <div class="tooltip">
        <div class="tooltip__content">
            <p class="tooltip__text"></p>
        </div>
    </div>
</div>
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
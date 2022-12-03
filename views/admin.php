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
    <title>Admin panel</title>
    <link rel="icon" href="../static/icons/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/sass/styles/admin-panel.css">
    <link rel="stylesheet" href="../assets/sass/global.css">
    <script src="../libs/inputmask.js" defer></script>
    <script src="../static/scripts/search.js" defer></script>
    <script src="../static/scripts/dropdown-toggle.js" defer></script>
    <script src="../static/scripts/change-options.js" defer></script>
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
                        <?php if (isset($_SESSION["user"]) === true && $_SESSION["user"]->roles_id == 1): ?>
                            <li class="dropdown__item">
                                <a href="#" class="dropdown__link dropdown__link_focus dropdown__link_hover dropdown__link_active">
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
<section class="page__admin admin">
    <aside class="admin__aside aside">
        <header class="aside__header">
            <h2 class="aside__headline">Menu</h2>
        </header>
        <ul class="aside__list">
            <li class="aside__item">
                <?php if (isset($isDashboard)): ?>
                <a href="../index.php?page=admin-panel&section=dashboard" class="aside__link link aside__link_hover aside__link_focus aside__link_active">Dashboard</a>
                <?php else: ?>
                <a href="../index.php?page=admin-panel&section=dashboard" class="aside__link link aside__link_hover aside__link_focus">Dashboard</a>
                <?php endif; ?>
            </li>
            <li class="aside__item">
                <?php if (isset($isClientsInfo)): ?>
                <a href="../index.php?page=admin-panel&section=clients-info" class="aside__link link aside__link_hover aside__link_focus aside__link_active">Clients</a>
                <?php else: ?>
                <a href="../index.php?page=admin-panel&section=clients-info" class="aside__link link aside__link_hover aside__link_focus">Clients</a>
                <?php endif; ?>
            </li>
            <li class="aside__item">
                <?php if (isset($isPlansInfo)): ?>
                <a href="../index.php?page=admin-panel&section=plans-info" class="aside__link link aside__link_hover aside__link_focus aside__link_active">Plans</a>
                <?php else: ?>
                <a href="../index.php?page=admin-panel&section=plans-info" class="aside__link link aside__link_hover aside__link_focus">Plans</a>
                <?php endif; ?>
            </li>

            <li class="aside__item">
                <?php if (isset($isSettings)): ?>
                <a href="../index.php?page=admin-panel&section=settings" class="aside__link link aside__link_hover aside__link_focus aside__link_active">Settings</a>
                <?php else: ?>
                <a href="../index.php?page=admin-panel&section=settings" class="aside__link link aside__link_hover aside__link_focus">Settings</a>
                <?php endif; ?>
            </li>
        </ul>
    </aside>
    <?php if (isset($isDashboard)): ?>
        <header class="admin__header">
            <h1 class="admin__headline headings">Dashboard</h1>
        </header>
        <div class="admin__table-container">
            <div class="admin__table-wrap">
                <table class="admin__table table">
                    <caption class="table__caption">Plans</caption>
                    <thead class="table__thead">
                    <tr class="table__row">
                        <th class="table__head">name</th>
                        <th class="table__head">amount</th>
                        <th class="table__head">percent</th>
                        <th class="table__head">description</th>
                        <th class="table__head">term</th>
                        <th class="table__head">type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($plans as $plan): ?>
                        <tr class="table__row table__row_hover">
                            <td class="table__cell"><?php echo $plan["plan_name"]?></td>
                            <td class="table__cell"><?php echo $plan["plan_amount"]?>$</td>
                            <td class="table__cell"><?php echo ($plan["plan_percent"] === NULL) ? "-" : $plan["plan_percent"] . " %" ?></td>
                            <td class="table__cell"><?php echo ($plan["plan_description"] === NULL) ? "-" : $plan["plan_description"] ?></td>
                            <td class="table__cell"><?php echo $plan["plan_term"]?> days</td>
                            <td class="table__cell"><?php echo $plan["plan_type"]?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="admin__table-wrap">
                <table class="admin__table table">
                    <caption class="table__caption">Feedbacks</caption>
                    <thead class="table__thead">
                    <tr class="table__row">
                        <th class="table__head">message</th>
                        <th class="table__head">date</th>
                        <th class="table__head">client</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($feedbacks as $feedback): ?>
                        <?php foreach ($clients_with_feedbacks as $client): ?>
                            <?php if ($feedback["clients_id"] == $client["id"]): ?>
                        <tr class="table__row table__row_hover">
                            <td class="table__cell"><?php echo $feedback["feedback_message"]?></td>
                            <td class="table__cell"><?php echo date("d F Y",  strtotime($feedback["feedback_date"]))?></td>
                            <td class="table__cell"><?php echo $client["client_name"] . " " . $client["client_last_name"] . " " . $client["client_patronymic"] ?></td>
                        </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="admin__table-wrap">
                <table class="admin__table table">
                    <caption class="table__caption">Accounts</caption>
                    <thead class="table__thead">
                    <tr class="table__row">
                        <th class="table__head">number</th>
                        <th class="table__head">balance</th>
                        <th class="table__head">debt</th>
                        <th class="table__head">client</th>
                        <th class="table__head">opening date</th>
                        <th class="table__head">closing date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($account_statistic as $account): ?>
                        <?php foreach ($clients as $client): ?>
                            <?php if ($account["account"]["clients_id"] == $client["id"]): ?>
                            <tr class="table__row table__row_hover">
                                <td class="table__cell"><?php echo $account["account"]["account_number"]?></td>
                                <td class="table__cell"><?php echo $account["account"]["account_balance"]?> $</td>
                                <td class="table__cell"><?php echo $account["account"]["account_debt"]?> $</td>
                                <td class="table__cell"><?php echo $client["client_name"] . " " . $client["client_last_name"] . " " . $client["client_patronymic"] ?></td>
                                <td class="table__cell"><?php echo date("d F Y", strtotime($account["statistic"]["account_statistic_opening_date"]))?></td>
                                <td class="table__cell"><?php echo ($account["statistic"]["account_statistic_closing_date"] === NULL) ? "-" : date("d F Y", strtotime($account["statistic"]["account_statistic_closing_date"]))?></td>
                            </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="admin__table-wrap">
                <table class="admin__table table">
                    <caption class="table__caption">Clients</caption>
                    <thead class="table__thead">
                    <tr class="table__row">
                        <th class="table__head">full name</th>
                        <th class="table__head">phone</th>
                        <th class="table__head">email</th>
                        <th class="table__head">passport</th>
                        <th class="table__head">birthday</th>
                        <th class="table__head">gender</th>
                        <th class="table__head">role</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($clients as $client): ?>
                        <?php foreach ($roles as $role): ?>
                            <?php if ($client["roles_id"] == $role["id"]): ?>
                                <tr class="table__row table__row_hover">
                                    <td class="table__cell"><?php echo $client["client_name"] . " " . $client["client_last_name"] . " " . $client["client_patronymic"] ?></td>
                                    <td class="table__cell"><?php echo $client["client_phone"]?></td>
                                    <td class="table__cell"><?php echo $client["client_email"]?></td>
                                    <td class="table__cell"><?php echo $client["client_passport"]?></td>
                                    <td class="table__cell"><?php echo date("d F Y", strtotime($client["client_birthday"]))?></td>
                                    <td class="table__cell"><?php echo $client["client_gender"]?></td>
                                    <td class="table__cell"><?php echo $role["role_type"]?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($isClientsInfo)): ?>
        <header class="admin__header">
            <h1 class="admin__headline headings">Clients Info</h1>
        </header>
        <div class="wrap">
            <div class="client-info">
                <form action="../index.php?page=admin-panel&section=clients-info&action=get-clients-info" method="post" class="client-info__form form">
                    <label for="" class="client-info__label">
                        <select class="client-info__select select client-info__select_hover client-info__select_focus" name="option" required>
                            <option value="" selected disabled>Options:</option>
                            <option value="client_age">Age</option>
                            <option value="client_last_name">Last name</option>
                            <option value="client_gender">Gender</option>
                            <option value="client_phone">Phone number</option>
                            <option value="account">Account number</option>
                        </select>
                    </label>
                    <label class="client-info__label client-info__label_hide" for="">
                        <input type="text" class="client-info__input input client-info__input_hover client-info__input_focus" placeholder="Enter data" name="client-data" required>
                    </label>
                    <button type="submit" class="client-info__btn btn client-info__btn_hover client-info__btn_focus">Run</button>
                </form>
                <?php if (isset($client_info)): ?>
                    <a class="client-info__cross-circle" href="../index.php?page=admin-panel&section=clients-info"></a>
                    <ul class="client-info__results">
                        <?php if (count($client_info) > 0): ?>
                            <?php foreach ($client_info as $result): ?>
                                <?php foreach ($roles as $role): ?>
                                    <?php if ($result["roles_id"] == $role["id"]): ?>
                                        <li class="client-info__result client-info__result_border-top">
                                            <p class="client-info__text">
                                                Full name: <?php echo $result["client_name"] . " " . $result["client_last_name"] . " " . $result["client_patronymic"] ?>
                                            </p>
                                        </li>
                                        <li class="client-info__result">
                                            <p class="client-info__text">
                                                Phone: <?php echo $result["client_phone"] ?>
                                            </p>
                                        </li>
                                        <li class="client-info__result">
                                            <p class="client-info__text">
                                                Email: <?php echo $result["client_email"] ?>
                                            </p>
                                        </li>
                                        <li class="client-info__result">
                                            <p class="client-info__text">
                                                Birthday: <?php echo date("d F Y", strtotime($result["client_birthday"])) ?>
                                            </p>
                                        </li>
                                        <li class="client-info__result">
                                            <p class="client-info__text">
                                                Gender: <?php echo $result["client_gender"] ?>
                                            </p>
                                        </li>
                                        <li class="client-info__result">
                                            <p class="client-info__text">
                                                Passport: <?php echo $result["client_passport"] ?>
                                            </p>
                                        </li>
                                        <li class="client-info__result">
                                            <p class="client-info__text">
                                                Role: <?php echo $role["role_type"] ?>
                                            </p>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="client-info__result">
                                <p class="client-info__text">
                                    No results
                                </p>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
                <div class="admin__table-container">
                    <div class="admin__table-wrap">
                        <?php if (!$debtors): ?>
                            <p class="admin__plug">No debtors</p>
                        <?php else: ?>
                            <table class="admin__table table">
                                <caption class="table__caption">The debt on the loan is more than a month</caption>
                                <thead class="table__thead">
                                    <tr class="table__row">
                                        <th class="table__head">full name</th>
                                        <th class="table__head">account number</th>
                                        <th class="table__head">debt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($debtors as $debtor): ?>
                                    <tr class="table__row table__row_hover">
                                        <td class="table__cell"><?php echo $debtor["client"]["client_name"] . " " . $debtor["client"]["client_last_name"] . " " . $debtor["client"]["client_patronymic"] ?></td>
                                        <td class="table__cell"><?php echo $debtor["account"]["account_number"]?></td>
                                        <td class="table__cell"><?php echo $debtor["account"]["account_debt"]?>$</td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="admin__table-container">
                    <div class="admin__table-wrap">
                        <table class="admin__table table">
                            <caption class="table__caption">Loan debtors</caption>
                            <thead class="table__thead">
                                <tr class="table__row">
                                    <th class="table__head">full name</th>
                                    <th class="table__head">account number</th>
                                    <th class="table__head">debt</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table__row table__row_hover">
                                    <td class="table__cell"><?php echo $client_max_debt["client_name"] . " " . $client_max_debt["client_last_name"] . " " . $client_max_debt["client_patronymic"] ?></td>
                                    <td class="table__cell"><?php echo $account_max_debt["account_number"]?></td>
                                    <td class="table__cell"><?php echo $account_max_debt["account_debt"]?>$</td>
                                <tr class="table__row table__row_hover">
                                    <td class="table__cell"><?php echo $client_min_debt["client_name"] . " " . $client_min_debt["client_last_name"] . " " . $client_min_debt["client_patronymic"] ?></td>
                                    <td class="table__cell"><?php echo $account_min_debt["account_number"]?></td>
                                    <td class="table__cell"><?php echo $account_min_debt["account_debt"]?>$</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="admin__table-container">
                    <div class="admin__table-wrap">
                        <table class="admin__table table">
                            <caption class="table__caption">Sum loans</caption>
                            <thead class="table__thead">
                                <tr class="table__row">
                                    <th class="table__head">full name</th>
                                    <th class="table__head">account number</th>
                                    <th class="table__head">balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table__row table__row_hover">
                                    <td class="table__cell"><?php echo $client_min_sum_loan["client_name"] . " " . $client_min_sum_loan["client_last_name"] . " " . $client_min_sum_loan["client_patronymic"] ?></td>
                                    <td class="table__cell"><?php echo $account_min_sum_loan["account_number"]?></td>
                                    <td class="table__cell"><?php echo $account_min_sum_loan["account_balance"]?>$</td>
                                </tr>
                                <tr class="table__row table__row_hover">
                                    <td class="table__cell"><?php echo $client_max_sum_loan["client_name"] . " " . $client_max_sum_loan["client_last_name"] . " " . $client_max_sum_loan["client_patronymic"] ?></td>
                                    <td class="table__cell"><?php echo $account_max_sum_loan["account_number"]?></td>
                                    <td class="table__cell"><?php echo $account_max_sum_loan["account_balance"]?>$</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($isPlansInfo)): ?>
        <header class="admin__header">
            <h1 class="admin__headline headings">Plans Info</h1>
        </header>
        <div class="wrap">
            <div class="plans-info">
                <form action="../index.php?page=admin-panel&section=plans-info&action=get-plans-info" method="post" class="plans-info__form form">
                    <p class="plans-info__separator">Open accounts from date</p>
                    <label class="plans-info__label" for="">
                       <input type="date" class="plans-info__input input plans-info__input_hover plans-info__input_focus" placeholder="Enter data" name="first-date" required>
                    </label>
                    <p class="plans-info__separator">to date</p>
                    <label class="plans-info__label" for="">
                        <input type="date" class="plans-info__input input plans-info__input_hover plans-info__input_focus" placeholder="Enter data" name="second-date" required>
                    </label>
                    <button type="submit" class="plans-info__btn btn plans-info__btn_hover plans-info__btn_focus">Run</button>
                </form>
                <?php if (isset($plans_info)): ?>
                    <a class="plans-info__cross-circle" href="../index.php?page=admin-panel&section=plans-info"></a>
                    <ul class="plans-info__results">
                        <?php if (count($plans_info) > 0): ?>
                            <?php foreach ($plans_info as $result): ?>
                                <li class="plans-info__result plans-info__result_border-top">
                                    <p class="plans-info__text">
                                        Account number: <?php echo $result["account"]["account_number"] ?>
                                    </p>
                                </li>
                                <li class="plans-info__result">
                                    <p class="plans-info__text">
                                        Account balance: <?php echo $result["account"]["account_balance"] ?> $
                                    </p>
                                </li>
                                <?php if ($result["account"]["account_debt"] < 0): ?>
                                    <li class="plans-info__result">
                                        <p class="plans-info__text">
                                            Account debt: <?php echo $result["account"]["account_debt"] ?> $
                                        </p>
                                    </li>
                                <?php endif; ?>
                                <li class="plans-info__result">
                                    <p class="plans-info__text">
                                        Opening date: <?php echo date("d F Y", strtotime($result["statistic"]["account_statistic_opening_date"])) ?>
                                    </p>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="plans-info__result">
                                <p class="plans-info__text">
                                    No results
                                </p>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
                <div class="admin__table-container">
                    <div class="admin__table-wrap">
                        <?php if (!$saving_and_cumulative): ?>
                            <p class="admin__plug">No accounts</p>
                        <?php else: ?>
                            <table class="admin__table table">
                                <caption class="table__caption">Savings and cumulative deposits </caption>
                                <thead class="table__thead">
                                    <tr class="table__row">
                                        <th class="table__head">account number</th>
                                        <th class="table__head">opening date</th>
                                        <th class="table__head">closing date</th>
                                        <th class="table__head">type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($saving_and_cumulative as $account): ?>
                                    <?php foreach ($account as $account_data): ?>
                                        <tr class="table__row table__row_hover">
                                            <td class="table__cell"><?php echo $account_data["account_number"]?></td>
                                            <td class="table__cell"><?php echo date("d F Y", strtotime($account_data["account_statistic_opening_date"]))?></td>
                                            <td class="table__cell"><?php echo date("d F Y", strtotime($account_data["account_statistic_closing_date"]))?></td>
                                            <td class="table__cell"><?php echo $account_data["plan_type"]?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="admin__table-container">
                    <div class="admin__table-wrap">
                        <?php if (!$sum_money_saving): ?>
                            <p class="admin__plug">Savings accounts are not issued</p>
                        <?php else: ?>
                            <table class="admin__table table">
                                <caption class="table__caption">Saving accounts sum</caption>
                                <thead class="table__thead">
                                    <tr class="table__row">
                                        <th class="table__head">sum</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table__row table__row_hover">
                                        <td class="table__cell"><?php echo $sum_money_saving ?>$</td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="admin__table-container">
                    <div class="admin__table-wrap">
                        <?php if (!$open_loans): ?>
                            <p class="admin__plug">Loans not found</p>
                        <?php else: ?>
                            <table class="admin__table table">
                                <caption class="table__caption">Opening loans</caption>
                                <thead class="table__thead">
                                    <tr class="table__row">
                                        <th class="table__head">account number</th>
                                        <th class="table__head">account_balance</th>
                                        <th class="table__head">opening date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($open_loans as $account): ?>
                                        <tr class="table__row table__row_hover">
                                            <td class="table__cell"><?php echo $account["account"]["account_number"]?></td>
                                            <td class="table__cell"><?php echo $account["account"]["account_balance"]?>$</td>
                                            <td class="table__cell"><?php echo date("d F Y", strtotime($account["opening_date"])) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                    <div class="admin__table-wrap">
                        <?php if (!$sum_loans): ?>
                            <p class="admin__plug">Loans not found</p>
                        <?php else: ?>
                        <table class="admin__table table">
                            <caption class="table__caption">Loans sum</caption>
                            <thead class="table__thead">
                                <tr class="table__row">
                                    <th class="table__head">total sum</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table__row table__row_hover">
                                    <td class="table__cell"><?php echo $sum_loans?> $</td>
                                </tr>
                            </tbody>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($isSettings)): ?>
        <header class="admin__header">
            <h1 class="admin__headline headings">Settings</h1>
        </header>
        <div class="wrap">
            <div class="settings">
                <form action="../index.php?page=admin-panel&section=settings&action=change-settings" method="post" class="settings__form form">
                    <fieldset class="settings__fieldset form__fieldset">
                        <div class="settings__fieldset-container">
                            <h3 class="settings__subtitle">Logo</h3>
                            <label class="settings__label settings__label-file settings__label-file settings__label-file_hover settings__label-file_focus" for="">
                                <input type="file" class="settings__input settings__input_hide input settings__input_hover settings__input_focus" placeholder="Site name" name="site-name" value="Certia">
                            </label>
                            <img src="../static/icons/logo.svg" alt="Logo" width="200" height="100">
                        </div>
                        <div class="settings__fieldset-container">
                            <h3 class="settings__subtitle">Favicon</h3>
                            <label class="settings__label settings__label-file settings__label-file settings__label-file_hover settings__label-file_focus" for="">
                                <input type="file" class="settings__input settings__input_hide input settings__input_hover settings__input_focus" placeholder="Site name" name="site-name" value="Certia">
                            </label>
                            <img src="../static/icons/favicon.svg" alt="Logo" width="50" height="50">
                        </div>
                    </fieldset>
                    <h3 class="settings__subtitle">Site name</h3>
                    <label class="settings__label" for="">
                        <input type="text" class="settings__input input settings__input_hover settings__input_focus" placeholder="Site name" name="site-name" value="Certia">
                    </label>
                    <h3 class="settings__subtitle">Keywords</h3>
                    <label class="settings__label" for="">
                        <input type="text" class="settings__input input settings__input_hover settings__input_focus" placeholder="Keywords" name="keywords" value="bank, certia, Bank, Certia">
                    </label>
                    <h3 class="settings__subtitle">Description</h3>
                    <label class="settings__label" for="">
                        <input type="text" class="settings__input input settings__input_hover settings__input_focus" placeholder="Description" value="Web resource for Certia Bank" name="description">
                    </label>
                    <h3 class="settings__subtitle">Email company</h3>
                    <label class="settings__label" for="">
                        <input type="text" class="settings__input input settings__input_hover settings__input_focus" placeholder="Email" value="certia@gmail.com" name="email">
                    </label>
                    <button type="submit" class="settings__btn btn settings__btn_hover plans-info__btn_focus">Enter</button>
                </form>
            </div>
        </div>
    <?php endif;?>
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
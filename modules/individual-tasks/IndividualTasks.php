<?php
class IndividualTasks extends ConnectDataBase {
    public function __construct($name)
    {
        parent::__construct($name);
    }

    // Получение информации о клиентах
    public function gettingClientsInfo($event, $param = NULL)
    {
        $clients = null;
        switch ($event) {
            // Получение клиентов банка по возрастному признаку
            case "birthday":
                $current_year = date("Y");
                $clients = R::findALl("clients", "YEAR(birthday) = $current_year - $param");
                break;
            // Получение клиентов банка по группе фамилия
            case "surname":
                $clients = R::findAll("clients", "fullname LIKE ? ", [ "%$param%" ]);
                break;
            // Получение клиентов банка по половому признаку
            case "gender":
                $clients = R::findAll("clients", "gender = '$param'");
                break;
            // Получение всех клиентов с наименьшей и наибольшей суммой задолжности по кредиту
            case "debts":
                $clients = R::getAll("SELECT * FROM clientsbankaccounts WHERE AmountAccount < 0 AND AccountType = 'Credit' ORDER BY AmountAccount $param");
                break;
            // Получение полной информации о клиенте с заданым номер счета
            case "account":
                $clients = R::getRow("SELECT * FROM clientsbankaccounts WHERE AccountId = $param");
                break;
            // получение клиента с наибольшей (наименьшей) суммой кредита
            case "credits":
                $clients = R::getAll("SELECT ClientId, Fullname, AccountId, AmountAccount, AccountType FROM clientsbankaccounts WHERE AccountType = 'Credit' AND AmountAccount > 0 ORDER BY AmountAccount $param limit 1");
                break;
            // проверка наличия банковского счета по номеру телефона
            case "phone":
                $clients = R::getRow("SELECT * FROM clientsbankaccounts WHERE Phone = '$param'");
                break;
            // Получение общего числа задолжников, с задолжностью больше месяца
            case "debtors-more-month":
                $current_month = date('m');
                $payments = R::getAll("SELECT * FROM accountloanpayments WHERE AmountAccount < 0 AND MONTH(DateDebiting) < $current_month");
                foreach ($payments as $payment) {
                    $clients = R::load("clients", $payment["ClientId"]);
                }
                break;
            // Получение всех клиентов
            default:
                $clients = R::findAll("clients");
                break;
        }
        return (count($clients) > 0) ? print_r(json_encode($clients)) : print_r("Not found");
    }

    // Получение открытых кредитов за определенный период
    public function gettingCreditsForPeriod($from, $to) {
        $credits = R::getAll("SELECT ClientId, Fullname, AccountId, AmountAccount, OpeningDate, ClosingDate, Status FROM clientsbankaccounts WHERE AccountType = 'Credit' AND Status = 'open' AND OpeningDate BETWEEN '$from' AND '$to'");
        return (count($credits) > 0) ? print_r(json_encode($credits)) : print_r("Not found");
    }

    // Получение открытых кредитных счетов, общей суммы кредитных средств, выданных пользователям
    public function gettingCredits() {
        $credits = R::getAll("SELECT SUM(AmountAccount) AS SumAmountAccount, AccountType, Status FROM clientsbankaccounts WHERE AccountType = 'Credit' AND Status = 'open'");
        return (count($credits) > 0) ? print_r(json_encode($credits)) : print_r("Not found");
    }

    // Получение информации о депозитах
    public function gettingDeposits($type)
    {
        $deposits = null;
        switch ($type) {
            // получение всех вкладов, вида сберегательный, (открытых, закрытых) на данный момент
            case "saving":
                $deposits = R::getAll("SELECT * FROM plansbankaccounts WHERE PlansType = 'Saving' AND :date BETWEEN OpeningDate AND ClosingDate", [':date' => date('Y-m-d')]);
                break;
            // получение всех вкладов, вида накопительный, (открытых, закрытых) на данный момент
            case "cumulative":
                $deposits = R::getAll("SELECT * FROM plansbankaccounts WHERE PlansType = 'Cumulative' AND :date BETWEEN OpeningDate AND ClosingDate", [':date' => date('Y-m-d')]);
                break;
            // Получение суммы денежных средств хранимых клиентами на сберегательном счету
            case "saving-sum":
                $deposits = R::getAll("SELECT SUM(AmountAccount) FROM clientsbankaccounts WHERE AccountType = 'Saving'");
                break;
            // Получение всех депозитов
            default:
                $deposits = R::getAll("SELECT * FROM plansbankaccounts WHERE PlansType = 'Saving' OR PlansType = 'Cumulative' OR PlansType = 'Calculated'");
                break;
        }
        return (count($deposits) > 0) ? print_r(json_encode($deposits)) : print_r("Not found");
    }
}
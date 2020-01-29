<?php

namespace Omnipay\AnyMoney\Exception\ru;

use Omnipay\AnyMoney\Exception\LocalizedError;
use Omnipay\AnyMoney\Exception\SystemError;

/**
 * Any.Money protocol errors russian localization.
 */
class HumanError extends LocalizedError
{
    protected static $_errors = [
        SystemError::SUCCESS => null,
        SystemError::UNKNOWN => 'К сожалению, в настоящее время платеж данным способом невозможен. Попробуйте оплатить другим',
        SystemError::ACCESS_DENIED => 'Запрещены операции с данным набором параметров для терминала',
        SystemError::AMOUNT_ERROR => 'Ошибка суммы операции. Превышена сумма либо сумма операции не проверена в биллинге',
        SystemError::AMOUNT_EXCEED => 'Сумма транзакции превышает доступный остаток средств на выбранном счете',
    ];
}

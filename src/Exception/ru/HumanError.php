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
        SystemError::UNKNOWN => 'К сожалению, в настоящее время платеж данным способом невозможен. Попробуйте оплатить другим',
        SystemError::E_PARAM_AMOUNT_FORMAT_INVALID => 'Неправильный формат суммы',
        SystemError::E_PARAM_AMOUNT_TOO_BIG => 'Сумма больше максимальной суммы операции',
        SystemError::E_PARAM_AMOUNT_TOO_SMALL => 'Сумма меньше минимальной суммы операции',
        SystemError::E_PARAM_CURRENCY_INVALID => 'Валюта отсутствует в системе',
        SystemError::E_PARAM_FIELD_INVALID => 'Передан невалидный параметр callback_url',
        SystemError::E_PARAM_INVALID => 'Передано неверное значение параметра',
        SystemError::E_PARAM_PAYWAY_INVALID => 'Указана неверная платежная система',
        SystemError::E_PARAM_PERIOD_INVALID => 'Неправильный формат параметра expiry',
        SystemError::E_PARAM_TYPE => 'Переданное значение параметра имеет неверный тип',
        SystemError::E_PARAM_UNIQUE => 'Заказ с таким externalid уже существует',
        SystemError::E_STATE_PAYWAY_INACTIVE => 'Платежная система неактивна в данный момент',
        SystemError::E_STATE_PAYWAY_UNAVAIL => 'Данная платежная система заблокирована административно',
    ];
}

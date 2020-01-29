<?php

namespace Omnipay\AnyMoney\Exception\en;

use Omnipay\AnyMoney\Exception\LocalizedError;
use Omnipay\AnyMoney\Exception\SystemError;

/**
 * Any.Money protocol errors english localization.
 */
class HumanError extends LocalizedError
{
    protected static $_errors = [
        SystemError::SUCCESS => null,
        SystemError::UNKNOWN => 'Sorry, currently the payment with the method is impossible. Try another way',
        SystemError::ACCESS_DENIED => 'Operations with selected parameters are forbidden via terminal',
        SystemError::AMOUNT_ERROR => 'Transaction amount error. Amount exceeded or transaction amount not verified',
        SystemError::AMOUNT_EXCEED => 'Transaction amount exceeds available balance on selected account',
    ];
}

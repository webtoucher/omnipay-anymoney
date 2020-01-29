<?php

namespace Omnipay\AnyMoney\Exception;

/**
 * Any.Money protocol errors english localization.
 */
class SystemError extends LocalizedError
{
    const NONE = 'NONE';
    const SUCCESS = 'SUCCESS';
    const UNKNOWN = 'UNKNOWN';
    const ACCESS_DENIED = 'ACCESS_DENIED';
    const AMOUNT_ERROR = 'AMOUNT_ERROR';
    const AMOUNT_EXCEED = 'AMOUNT_EXCEED';

    protected static $_errors = [
        self::SUCCESS => null,
        self::UNKNOWN => self::UNKNOWN,
        self::ACCESS_DENIED => self::ACCESS_DENIED,
        self::AMOUNT_ERROR => self::AMOUNT_ERROR,
        self::AMOUNT_EXCEED => self::AMOUNT_EXCEED,
    ];
}

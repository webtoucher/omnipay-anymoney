<?php

namespace Omnipay\AnyMoney\Exception;

/**
 * Any.Money protocol errors english localization.
 */
class SystemError extends LocalizedError
{
    const UNKNOWN = 'unknown';
    const E_PARAM_AMOUNT_FORMAT_INVALID = 'EParamAmountFormatInvalid';
    const E_PARAM_AMOUNT_TOO_BIG = 'EParamAmountTooBig';
    const E_PARAM_AMOUNT_TOO_SMALL = 'EParamAmountTooSmall';
    const E_PARAM_CURRENCY_INVALID = 'EParamCurrencyInvalid';
    const E_PARAM_FIELD_INVALID = 'EParamFieldInvalid';
    const E_PARAM_INVALID = 'EParamInvalid';
    const E_PARAM_PAYWAY_INVALID = 'EParamPaywayInvalid';
    const E_PARAM_PERIOD_INVALID = 'EParamPeriodInvalid';
    const E_PARAM_TYPE = 'EParamType';
    const E_PARAM_UNIQUE = 'EParamUnique';
    const E_STATE_PAYWAY_INACTIVE = 'EStatePaywayInactive';
    const E_STATE_PAYWAY_UNAVAIL = 'EStatePaywayUnavail';

    protected static $_errors = [
        self::UNKNOWN => null,
        self::E_PARAM_AMOUNT_FORMAT_INVALID => self::E_PARAM_AMOUNT_FORMAT_INVALID,
        self::E_PARAM_AMOUNT_TOO_BIG => self::E_PARAM_AMOUNT_TOO_BIG,
        self::E_PARAM_AMOUNT_TOO_SMALL => self::E_PARAM_AMOUNT_TOO_SMALL,
        self::E_PARAM_CURRENCY_INVALID => self::E_PARAM_CURRENCY_INVALID,
        self::E_PARAM_FIELD_INVALID => self::E_PARAM_FIELD_INVALID,
        self::E_PARAM_INVALID => self::E_PARAM_INVALID,
        self::E_PARAM_PAYWAY_INVALID => self::E_PARAM_PAYWAY_INVALID,
        self::E_PARAM_PERIOD_INVALID => self::E_PARAM_PERIOD_INVALID,
        self::E_PARAM_TYPE => self::E_PARAM_TYPE,
        self::E_PARAM_UNIQUE => self::E_PARAM_UNIQUE,
        self::E_STATE_PAYWAY_INACTIVE => self::E_STATE_PAYWAY_INACTIVE,
        self::E_STATE_PAYWAY_UNAVAIL => self::E_STATE_PAYWAY_UNAVAIL,
    ];
}

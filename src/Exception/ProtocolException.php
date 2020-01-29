<?php

namespace Omnipay\AnyMoney\Exception;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * Any.Money protocol Exception.
 * Thrown when an error is caught from the Any.Money side.
 */
class ProtocolException extends InvalidRequestException
{
    public function __construct($code, $previous = null)
    {
        parent::__construct($code, 0, $previous);
        $this->message = SystemError::findMessage($code);
    }

    /**
     * @return bool|string
     */
    public function getSystemMessage()
    {
        /** @var LocalizedError $class */
        $class = "\\Omnipay\\AnyMoney\\Exception\\SystemError";
        return $class::findMessage($this->getMessage());
    }

    /**
     * @param string $language
     * @return bool|string
     */
    public function getHumanMessage($language)
    {
        /** @var LocalizedError $class */
        $class = "\\Omnipay\\AnyMoney\\Exception\\$language\\HumanError";
        return $class::findMessage($this->getMessage());
    }
}

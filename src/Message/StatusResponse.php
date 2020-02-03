<?php

namespace Omnipay\AnyMoney\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Any.Money Status Response.
 */
class StatusResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     */
    public function isSuccessful()
    {
        return $this->getState() === 'done';
    }

    /**
     * Return the transaction status.
     *
     * @return string
     */
    public function getState()
    {
        return $this->data['result']['status'];
    }
}

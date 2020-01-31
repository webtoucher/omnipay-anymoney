<?php

namespace Omnipay\AnyMoney\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Any.Money Purchase Response.
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * @inheritdoc
     */
    public function isSuccessful()
    {
        return $this->getState() === 'new';
    }

    /**
     * @inheritdoc
     */
    public function isRedirect()
    {
        return (bool) $this->getRedirectUrl();
    }

    /**
     * @inheritdoc
     */
    public function getRedirectUrl()
    {
        if (!isset($this->data['result']) || !isset($this->data['result']['redirect_url'])) {
            return null;
        }
        return $this->data['result']['redirect_url'];
    }

    /**
     * @inheritdoc
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }

    /**
     * @inheritdoc
     */
    public function getRedirectData()
    {
        return [];
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

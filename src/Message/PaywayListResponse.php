<?php

namespace Omnipay\AnyMoney\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Any.Money PaywayList Response.
 */
class PaywayListResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     */
    public function isSuccessful()
    {
        return true;
    }
}

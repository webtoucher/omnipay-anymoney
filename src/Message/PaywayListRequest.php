<?php

namespace Omnipay\AnyMoney\Message;

/**
 * Class PurchaseRequest.
 */
class PaywayListRequest extends AbstractRequest
{

    /**
     * @inheritdoc
     */
    public function getData()
    {
        return [
            'method' => 'payway.list',
            'jsonrpc' => '2.0',
            'id' => (string) (int) (microtime(true) * 1000),
        ];
    }
}

<?php

namespace Omnipay\AnyMoney\Message;

/**
 * Class PurchaseRequest.
 */
class PaywayListRequest extends AbstractRequest
{
    /**
     * Create response.
     *
     * @param mixed $data
     * @param int $statusCode
     * @return PaywayListResponse
     */
    protected function createResponse($data, $statusCode)
    {
        return $this->response = new PaywayListResponse($this, $data, $statusCode);
    }

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

<?php

namespace Omnipay\AnyMoney\Message;

/**
 * Class StatusRequest.
 */
class StatusRequest extends AbstractRequest
{
    /**
     * Create response.
     *
     * @param mixed $data
     * @param int $statusCode
     * @return PurchaseResponse
     */
    protected function createResponse($data, $statusCode)
    {
        return $this->response = new StatusResponse($this, $data, $statusCode);
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        return [
            'method' => 'status',
            'params' => [
                'externalid' => $this->getTransactionId(),
            ],
            'jsonrpc' => '2.0',
            'id' => (string) (int) (microtime(true) * 1000),
        ];
    }
}

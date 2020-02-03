<?php

namespace Omnipay\AnyMoney\Message;

/**
 * Any.Money Complete Purchase Request.
 */
class CompletePurchaseRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     * @return array Request data.
     */
    public function getData()
    {
        $result = $this->httpRequest->getContent();
        $result = json_decode($result, true);
        $result['sign'] = $this->httpRequest->headers->get('x-signature');

        return $result;
    }

    /**
     * @inheritdoc
     * @throws \Omnipay\Common\Exception\InvalidResponseException
     */
    protected function createResponse($data, $statusCode)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }

    /**
     * @inheritdoc
     * @return CompletePurchaseResponse
     */
    public function sendData($data)
    {
        $requestId = $data['ftime'];
        $this->log("Request from Any.Money API: [$requestId]\n" . json_encode($data, JSON_PRETTY_PRINT));
        return $this->createResponse($data);
    }
}

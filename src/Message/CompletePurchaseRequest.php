<?php

namespace Omnipay\AnyMoney\Message;

use Omnipay\Common\Exception\InvalidResponseException;

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
        $result = $this->httpRequest->request->all();
        $result['sign'] = $this->httpRequest->headers->get('x-signature');

        return $result;
    }

    /**
     * @inheritdoc
     * @return CompletePurchaseResponse
     */
    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}

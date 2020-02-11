<?php

namespace Omnipay\AnyMoney\Message;

use Omnipay\Common\Message\ResponseInterface;

/**
 * Class PurchaseRequest.
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * Get user email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getParameter('email');
    }

    /**
     * Set user email.
     *
     * @param string $value
     * @return $this
     */
    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    /**
     * Get type of payment.
     *
     * @return string
     */
    public function getIsMultiPay()
    {
        return $this->getParameter('isMultiPay');
    }

    /**
     * Set type of payment.
     *
     * @param string $value
     * @return $this
     */
    public function setIsMultiPay($value)
    {
        return $this->setParameter('isMultiPay', $value);
    }

    /**
     * Get payment way.
     *
     * @return string
     */
    public function getPayway()
    {
        return $this->getParameter('payway');
    }

    /**
     * Set payment way.
     *
     * @param string $value
     * @return $this
     */
    public function setPayway($value)
    {
        return $this->setParameter('payway', $value);
    }

    /**
     * Create response.
     *
     * @param mixed $data
     * @param int $statusCode
     * @return PurchaseResponse
     */
    protected function createResponse($data, $statusCode)
    {
        return $this->response = new PurchaseResponse($this, $data, $statusCode);
    }

    /**
     * @inheritdoc
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('merchantId', 'amount', 'currency', 'transactionId');

        return [
            'method' => 'invoice.create',
            'params' => [
                'amount' => $this->getAmount(),
                'callback_url' => $this->getNotifyUrl(),
                'client_email' => $this->getEmail(),
                'externalid' => $this->getTransactionId(),
                'in_curr' => $this->getCurrency(),
                'is_multypay' => $this->getIsMultiPay(),
                'payway' => $this->getPayway(),
                'redirect_url' => $this->getReturnUrl(),
            ],
            'jsonrpc' => '2.0',
            'id' => (string) (int) (microtime(true) * 1000),
        ];
    }
}

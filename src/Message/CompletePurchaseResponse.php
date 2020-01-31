<?php

namespace Omnipay\AnyMoney\Message;

use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Any.Money Complete Purchase Response.
 */
class CompletePurchaseResponse extends AbstractResponse
{
    /**
     * @var CompletePurchaseRequest
     */
    public $request;

    /**
     * @inheritdoc
     */
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);

        $signExpected = $this->request->calculateSign($this->data['params'], $this->data['id']);

        if ($this->getSign() !== $signExpected) {
            throw new InvalidResponseException('Failed to validate signature');
        }
    }

    /**
     * Whether the payment is successful.
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return $this->getState() === 'done';
    }

    /**
     * Return the sign.
     *
     * @return string
     */
    public function getSign()
    {
        return $this->data['sign'];
    }

    /**
     * Return the transaction identifier.
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->data['params']['externalid'];
    }

    /**
     * Return the transaction status.
     *
     * @return string
     */
    public function getState()
    {
        return $this->data['params']['status'];
    }
}

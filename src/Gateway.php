<?php

namespace Omnipay\AnyMoney;

use Guzzle\Http\ClientInterface;
use Omnipay\AnyMoney\Message\CompletePurchaseRequest;
use Omnipay\AnyMoney\Message\PaywayListRequest;
use Omnipay\AnyMoney\Message\PurchaseRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\AnyMoney\Message\AbstractRequest;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class Gateway extends AbstractGateway
{
    use LoggerTrait;

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Any.Money';
    }

    /**
     * @inheritdoc
     */
    public function getDefaultParameters()
    {
        return [
            'gateUrl' => 'https://api.any.money',
            'merchantId' => '',
            'privateKey' => '',
        ];
    }

    /**
     * Get gate base URL.
     *
     * @return string
     */
    public function getGateUrl()
    {
        return $this->getParameter('gateUrl');
    }

    /**
     * Set gate base URL.
     *
     * @param string $value
     * @return $this
     */
    public function setGateUrl($value)
    {
        return $this->setParameter('gateUrl', rtrim($value, '/'));
    }

    /**
     * Get merchant ID.
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    /**
     * Set merchant ID.
     *
     * @param string $value
     * @return $this
     */
    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     * Get API private key.
     *
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->getParameter('privateKey');
    }

    /**
     * Set API private key.
     *
     * @param string $value
     * @return $this
     */
    public function setPrivateKey($value)
    {
        return $this->setParameter('privateKey', $value);
    }

    /**
     * @param $name
     * @param array $parameters
     * @return AbstractRequest
     */
    private function getRequest($name, array $parameters)
    {
        $parameters['endpoint'] = $this->getGateUrl();
        $parameters['merchantId'] = $this->getMerchantId();
        $parameters['privateKey'] = $this->getPrivateKey();
        $parameters['logger'] = $this->logger;

        return $this->createRequest("\\Omnipay\\AnyMoney\\Message\\$name", $parameters);
    }

    /**
     * @param array $parameters
     * @return PurchaseRequest
     */
    public function purchase(array $parameters = [])
    {
        return $this->getRequest('PurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->getRequest('CompletePurchaseRequest', $parameters);
    }

    /**
     * @return PaywayListRequest
     */
    public function paywayList()
    {
        return $this->getRequest('PaywayListRequest', []);
    }
}

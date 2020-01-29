<?php

namespace Omnipay\AnyMoney;

use Guzzle\Http\ClientInterface;
use Omnipay\Common\AbstractGateway;
use Omnipay\AnyMoney\Message\AbstractRequest;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class Gateway extends AbstractGateway
{
    /**
     * @var callable
     */
    protected $logger;

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
     * Set logger function.
     *
     * @param callable $value
     * @return $this
     */
    public function setLogger($value)
    {
        $this->logger = $value;
        return $this;
    }

    /**
     * Log a message.
     *
     * @param string $message
     * @param string $level
     * @return void
     */
    protected function log($message, $level = 'info')
    {
        call_user_func($this->logger, $message, $level);
    }

    /**
     * @param $name
     * @param array $parameters
     * @return AbstractRequest
     */
    private function getRequest($name, array $parameters)
    {
        $parameters['baseEndpoint'] = $this->getGateUrl();
        $parameters['merchantId'] = $this->getMerchantId();
        $parameters['privateKey'] = $this->getPrivateKey();
        $parameters['logger'] = $this->logger;

        return $this->createRequest("\\Omnipay\\AnyMoney\\Message\\$name", $parameters);
    }

    /**
     * @param array $parameters
     * @return AbstractRequest
     */
    public function purchase(array $parameters = [])
    {
        return $this->getRequest('PurchaseRequest', $parameters);
    }
}

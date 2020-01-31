<?php

namespace Omnipay\AnyMoney\Message;

use Guzzle\Common\Event;
use Omnipay\AnyMoney\Exception\ProtocolException;
use Omnipay\AnyMoney\Gateway;
use Omnipay\AnyMoney\LoggerTrait;
use Omnipay\AnyMoney\SignTrait;
use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use Omnipay\Common\Message\ResponseInterface;

abstract class AbstractRequest extends BaseAbstractRequest
{
    use LoggerTrait, SignTrait;

    /**
     * Return the endpoint.
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->getParameter('endpoint');
    }

    /**
     * Set the endpoint.
     *
     * @param string $endpoint
     * @return \Omnipay\InterKassa\Message\AbstractRequest
     */
    public function setEndpoint($value)
    {
        return $this->setParameter('endpoint', $value);
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
     * @inheritdoc
     */
    public function getData()
    {
        return [];
    }

    /**
     * Create response.
     *
     * @param mixed $data
     * @param int $statusCode
     * @return ResponseInterface
     */
    abstract protected function createResponse($data, $statusCode);

    /**
     * @inheritdoc
     * @throws InvalidResponseException
     */
    public function sendData($data)
    {
        // Don't throw exceptions for 4xx errors
        $this->httpClient->getEventDispatcher()->addListener(
            'request.error',
            function (Event $event) {
                if ($event['response']->isClientError()) {
                    $event->stopPropagation();
                }
            }
        );

        $requestId = $data['id'];
        $headers = [
            'Content-type' => 'application/json',
            'x-merchant' => $this->getMerchantId(),
            'x-utc-now-ms' => $requestId,
            'x-signature' => $this->calculateSign($requestId, isset($data['params']) ? $data['params'] : []),
        ];

        $this->log("Request to Any.Money API: [$requestId] "
            . $this->getEndpoint() . "\n" . json_encode($data, JSON_PRETTY_PRINT));
        $httpRequest = $this->httpClient->createRequest(
            'POST',
            $this->getEndpoint(),
            $headers,
            json_encode($data)
        );

        try {
            $httpResponse = $httpRequest->send();
            // Empty response body should be parsed also as and empty array
            $responseData = $httpResponse->getBody(true) ? $httpResponse->json() : [];
            $responseStatus = $httpResponse->getStatusCode();
            $this->log("Response from Any.Money API: [$requestId] [$responseStatus]\n"
                . json_encode($responseData, JSON_PRETTY_PRINT));
            if (isset($responseData['error'])) {
                throw new ProtocolException($responseData['error']['message'], $responseData['error']['data']);
            }
            return $this->response = $this->createResponse($responseData, $responseStatus);
        } catch (\Exception $e) {
            $this->log("Request is failed: [$requestId] {$e->getMessage()}", 'error');
            throw new InvalidResponseException(
                'Error communicating with payment gateway: ' . $e->getMessage(),
                $e->getCode()
            );
        }
    }
}

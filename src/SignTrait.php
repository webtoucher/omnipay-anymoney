<?php

namespace Omnipay\AnyMoney;
use Omnipay\Common\Exception\RuntimeException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\AbstractResponse;

trait SignTrait
{
    /**
     * Calculate the sign for request or answer.
     *
     * @param string $requestId
     * @param array $data
     * @return bool|string
     * @throws \Omnipay\Common\Exception\RuntimeException
     */
    public function calculateSign($requestId, $data)
    {
        if ($this instanceof AbstractRequest) {
            $privateKey = $this->getPrivateKey();
        } elseif ($this instanceof AbstractResponse) {
            $privateKey = $this->getRequest()->getPrivateKey();
        } else {
            throw new RuntimeException('Wrong using of the trait.');
        }
        ksort($data);
        $preparedData = '';
        foreach ($data as $value) {
            if (null === $value || is_array($value)) {
                continue;
            }
            if (is_bool($value)) {
                $preparedData .= $value ? 'true' : 'false';
            } else {
                $preparedData .= $value;
            }
        }
        $preparedData .= $requestId;
        return hash_hmac('SHA512', strtolower($preparedData), $privateKey);
    }
}

<?php

namespace Omnipay\AnyMoney;

use Omnipay\Common\Message\AbstractRequest;

trait LoggerTrait
{
    /**
     * @var callable
     */
    protected $logger;

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
        if ($this->logger) {
            call_user_func($this->logger, $message, $level);
        }
    }
}

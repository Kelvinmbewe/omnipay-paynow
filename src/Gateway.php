<?php

namespace Omnipay\Paynow;

use Omnipay\Common\AbstractGateway;
use Omnipay\PayNow\Message\CompletePurchaseRequest;
use Omnipay\PayNow\Message\PurchaseRequest;

/**
 * Paynow Gateway
 *
 * @link http://developers.paynow.co.zw/
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'PayNow';
    }

    public function getDefaultParameters()
    {
        return array(
            'integration_id' => '',
            'integration_key' => '',
            'testMode' => false,
        );
    }

    public function getIntegrationID()
    {
        return $this->getParameter('integration_id');
    }

    public function setIntegrationID($value)
    {
        return $this->setParameter('integration_id', $value);
    }

    public function getIntegrationKey()
    {
        return $this->getParameter('integration_key');
    }

    public function setIntegrationKey($value)
    {
        return $this->setParameter('integration_key', $value);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayNow\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayNow\Message\CompletePurchaseRequest', $parameters);
    }
}

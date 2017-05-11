<?php

namespace Omnipay\PayNow;

use Omnipay\Common\AbstractGateway;

/**
 * PayNow Gateway
 *
 *
 * @link https://developers.paynow.co.zw
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
            'merchantId' => '',
            'merchantKey' => '',
            'pdtKey' => '',
            'testMode' => false,
        );
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    public function getMerchantKey()
    {
        return $this->getParameter('merchantKey');
    }

    public function setMerchantKey($value)
    {
        return $this->setParameter('merchantKey', $value);
    }

    public function getPdtKey()
    {
        return $this->getParameter('pdtKey');
    }

    public function setPdtKey($value)
    {
        return $this->setParameter('pdtKey', $value);
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

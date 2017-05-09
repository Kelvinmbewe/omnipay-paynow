<?php

namespace Omnipay\PayNow\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * PayNow Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{
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

    public function getData()
    {
        $this->validate('amount', 'returnUrl');

        $data = array();
        $data['sid'] = $this->getIntegrationID();
        $data['cart_order_id'] = $this->getTransactionId();
        $data['merchant_order_id'] = $this->getTransactionId();
        $data['total'] = $this->getAmount();
        $data['tco_currency'] = $this->getCurrency();
        $data['fixed'] = 'Y';
        $data['skip_landing'] = 1;
        $data['x_receipt_link_url'] = $this->getReturnUrl();

        if ($this->getCard()) {
            $data['card_holder_name'] = $this->getCard()->getName();
            $data['street_address'] = $this->getCard()->getAddress1();
            $data['street_address2'] = $this->getCard()->getAddress2();
            $data['city'] = $this->getCard()->getCity();
            $data['state'] = $this->getCard()->getState();
            $data['zip'] = $this->getCard()->getPostcode();
            $data['country'] = $this->getCard()->getCountry();
            $data['phone'] = $this->getCard()->getPhone();
            $data['email'] = $this->getCard()->getEmail();
        }

        if ($this->getTestMode()) {
            $data['demo'] = 'Y';
        }

        return $data;
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}

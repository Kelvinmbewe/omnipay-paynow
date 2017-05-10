<?php

namespace Omnipay\PayZim\Message;

use Omnipay\Tests\TestCase;

class PurchaseRequestTest extends TestCase
{
    public function testConstruct()
    {
        $request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());

        $request->setIntegrationID('12345');
        $request->setIntegrationKey('integration_key');
        $request->setTransactionId('mytransaction1');
        $request->setAmount('10.00');
        $request->setReturnUrl('http://example.com/return');

        $requestData = $request->getData();

        $this->assertEquals($requestData['sid'], '12345');
        $this->assertEquals($requestData['cart_order_id'], 'mytransaction1');
        $this->assertEquals($requestData['merchant_order_id'], 'mytransaction1');
        $this->assertEquals($requestData['total'], '10.00');
        $this->assertEquals($requestData['x_receipt_link_url'], 'http://example.com/return');
    }
}

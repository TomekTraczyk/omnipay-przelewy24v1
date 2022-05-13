<?php

declare(strict_types=1);

use Omnipay\Przelewy24\Gateway;
use Omnipay\Przelewy24\Message\TestAccessRequest;
use Omnipay\Tests\GatewayTestCase;


class GatewayTest extends GatewayTestCase
{
    /**
     * @var Gateway
     */
    protected $gateway;

    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
    }

    /**
     * @test
     */
    public function it_should_return_the_name()
    {
        $this->assertSame('Przelewy24', $this->gateway->getName());
    }

    /**
     * @test
     */
    public function it_should_return_default_parameters()
    {
        $defaultParameters = $this->gateway->getDefaultParameters();
        $this->assertSame('', $defaultParameters['merchantId']);
        $this->assertSame('', $defaultParameters['posId']);
        $this->assertSame('', $defaultParameters['crc']);
        $this->assertSame('', $defaultParameters['reportKey']);
        $this->assertFalse($defaultParameters['testMode']);
    }

    /**
     * @test
     */
    public function it_should_set_and_get_merchant_id()
    {
        $merchantId = '42';

        $this->gateway->setMerchantId($merchantId);
        $this->assertSame($merchantId, $this->gateway->getMerchantId());
    }

    /**
     * @test
     */
    public function it_should_set_and_get_pos_id()
    {
        $posId = '13';

        $this->gateway->setPosId($posId);
        $this->assertSame($posId, $this->gateway->getPosId());
    }

    /**
     * @test
     */
    public function it_should_set_and_get_crc()
    {
        $crc = '1288348798';

        $this->gateway->setCrc($crc);
        $this->assertSame($crc, $this->gateway->getCrc());
    }

    /**
     * @test
     */
    public function it_should_set_and_get_report_key()
    {
        $crc = '6c2f6d86-3091-4291-b1e4-2568492605e4';

        $this->gateway->setReportKey($crc);
        $this->assertSame($crc, $this->gateway->getReportKey());
    }

    /**
     * @test
     */
    public function it_should_set_and_get_channel()
    {
        $channel = 32;

        $this->gateway->setChannel($channel);
        $this->assertSame($channel, $this->gateway->getChannel());
    }

    /**
     * @test
     */
    public function it_should_create_a_test_access()
    {
        $request = $this->gateway->testAccess();
        $this->assertInstanceOf(TestAccessRequest::class, $request);
    }
}
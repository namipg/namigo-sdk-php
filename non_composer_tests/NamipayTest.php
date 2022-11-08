<?php

namespace Namipay\Api\Test;

include 'Namipay.php';

use Namipay\Api\Api;

class NamipayTest extends \PHPUnit_Framework_TestCase
{
    function setUp()
    {
        $this->api = new Api($_SERVER['KEY_ID'], $_SERVER['KEY_SECRET']);
    }

    public function testApiAccess()
    {
		$this->assertInstanceOf('Namipay\Api\Api', $this->api);
	}

    public function testRequests()
	{
		$this->assertTrue(class_exists('\Requests'));
	}
}

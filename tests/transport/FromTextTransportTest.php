<?php

use Altaist\Parser\Transport\FromTextTransport;
use Altaist\Parser\Transport\InternetCurlTransport;
use Altaist\Parser\Transport\InternetSource;
use Altaist\Parser\Transport\InternetTransport;
use PHPUnit\Framework\TestCase;

class FromTextTransportTest extends TestCase
{
	function testLoad(){
		$transport = new FromTextTransport();
		$address = new InternetSource("<br><br>");
		$result = $transport->load($address);
		$this->assertEquals("<br><br>", $result);
	}
}
<?php

use Altaist\Parser\Transport\TextSource;

use PHPUnit\Framework\TestCase;

class StringAddressTest extends TestCase{

	public function testEmptyAddress(){
		$stringSource = new TextSource("");
		$this->assertEmpty($stringSource->getSource(), "Address is not empty");
	}
	public function testGetAddress(){
		$stringSource = new TextSource("123");
		$this->assertEquals("123", $stringSource->getSource(), "Wrong address");
	}
	public function testValidateAddress(){
		$stringSource = new TextSource("123");
		$this->assertTrue($stringSource->validate());
	}
	
}
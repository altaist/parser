<?php

use Altaist\Parser\Transport\InternetSource;
use PHPUnit\Framework\TestCase;

class InternetAddressTest extends TestCase
{

	public function testEmptyAddress()
	{
		$stringSource = new InternetSource("");
		$this->assertEmpty($stringSource->getSource());
	}
	public function testGetAddress()
	{
		$stringSource = new InternetSource("https://");
		$this->assertEquals("https://", $stringSource->getSource());
	}
	public function testValidateAddress()
	{
		$stringSource = new InternetSource("https://intellect04.ru");
		$this->assertTrue($stringSource->validate());
	}
	public function testValidateWrongAddress()
	{
		$stringSource = new InternetSource("123");
		$this->assertFalse($stringSource->validate());
	}
}

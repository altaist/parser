<?php

use Altaist\Parser\Storage\TagHolder;
use Altaist\Parser\Storage\TagStorage;
use Altaist\Parser\Transport\InternetSource;
use PHPUnit\Framework\TestCase;

class TagStorageTest extends TestCase
{
	function testEmpty(){
		$storage = new TagStorage();
		$this->assertEmpty($storage->getMap());
	}
	function testSet(){
		$storage = new TagStorage();
		$storage->set("<br>", new TagHolder("<br>", 1));
		$this->assertEquals($storage->get("<br>")->getValue(), 1);
	}
	function testSetAndIncrement(){
		$storage = new TagStorage();
		$storage->set("<br>", new TagHolder("<br>", 1));
		$holder = $storage->get("<br>");
		$holder->incrementValue();
		$this->assertEquals(2, $storage->get("<br>")->getValue());
	}
}

<?php
use Altaist\Parser\Processor\TagCounterProcessor;
use Altaist\Parser\Storage\TagStorage;
use PHPUnit\Framework\TestCase;



class TagCounterProcessorTest extends TestCase
{
	function testEmpty(){
		$storage = new TagStorage();
		$processor = new TagCounterProcessor($storage);
		$result = $processor->parse("<br><br>");
		$this->assertEquals(2, $result->get("<br>")->getValue());
	}
}
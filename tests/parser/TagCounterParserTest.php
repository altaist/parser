<?php
use Altaist\Parser\Builder\ParserBuilder;
use Altaist\Parser\Parser\TagCounterParser;
use Altaist\Parser\Processor\TagCounterProcessor;
use Altaist\Parser\Storage\TagStorage;
use Altaist\Parser\Transport\FromTextTransport;
use Altaist\Parser\Transport\TextSource;
use PHPUnit\Framework\TestCase;

class TagCounterParserTest extends TestCase
{
	protected function createParser(){
		
			$parserBuilder = (new ParserBuilder())
				->setTransportClass(FromTextTransport::class)
				->setStorageClass(TagStorage::class)
				->setProcessorClass(TagCounterProcessor::class)
				->setParserClass(TagCounterParser::class);

			$parser = $parserBuilder->build();
			return $parser;

	}
	protected function parse($textToParse){
		$parser = $this->createParser();
		$storage = $parser->parse(new TextSource($textToParse));
		
		return $storage;
	}
	function testEmpty(){
		$result = $this->parse("");
		$this->assertEmpty($result->getMap());
	}
	function testWrongTag(){
		$result = $this->parse("<br<br><p></p><p>");
		$this->assertEquals(1, $result->get("<br>")->getValue());
	}
	function testCounters(){
		$result = $this->parse("<br><p></p><p>");
		$this->assertEquals(1, $result->get("<br>")->getValue());
		$this->assertEquals(2, $result->get("<p>")->getValue());
	}
}
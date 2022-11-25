<?php
use Altaist\Parser\Builder\ParserBuilder;
use Altaist\Parser\Parser\TagCounterParser;
use Altaist\Parser\Processor\TagCounterProcessor;
use Altaist\Parser\Storage\TagStorage;
use Altaist\Parser\Transport\FromTextTransport;
use Altaist\Parser\Transport\TextSource;
use PHPUnit\Framework\TestCase;

class ParserBuilderTest extends TestCase
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
	function testNotEmpty(){
		$parser = $this->createParser();
		$this->assertNotEmpty($parser);
	}
	function testClassType(){
		$parser = $this->createParser();
		$this->assertInstanceOf(TagCounterParser::class, $parser);
	}

}
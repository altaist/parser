<?php
namespace Altaist\Parser\Example;

use Altaist\Parser\Builder\ParserBuilder;
use Altaist\Parser\Exception\BaseParserException;
use Altaist\Parser\Exception\ParseException;
use Altaist\Parser\Exception\TransportException;
use Altaist\Parser\Parser\TagCounterParser;
use Altaist\Parser\Processor\TagCounterProcessor;
use Altaist\Parser\Storage\TagStorage;

use Altaist\Parser\Transport\StringSource;
use Altaist\Parser\Transport\TestTransport;

class TagCounterExample{
	public function run(){
		try {
			$parserBuilder = (new ParserBuilder())
				->setTransportClass(TestTransport::class)
				->setStorageClass(TagStorage::class)
				->setProcessorClass(TagCounterProcessor::class)
				->setParserClass(TagCounterParser::class);

			$parser = $parserBuilder->build();

			$result = $parser->parse(new StringSource(" <br> br <br>"));
			print_r($result->getAsArray());
			
		} catch (TransportException $th) {
			// TODO
			throw $th;
			
		} catch (ParseException $th) {
			// TODO
			throw $th;
		}
		

	}
}
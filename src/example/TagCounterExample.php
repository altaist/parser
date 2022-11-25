<?php
namespace Altaist\Parser\Example;

use Altaist\Parser\Builder\ParserBuilder;
use Altaist\Parser\Exception\ParseException;
use Altaist\Parser\Exception\TransportException;
use Altaist\Parser\Formatter\ParseResultFormatter;
use Altaist\Parser\Parser\TagCounterParser;
use Altaist\Parser\Processor\TagCounterProcessor;
use Altaist\Parser\Storage\TagStorage;
use Altaist\Parser\Transport\FromTextTransport;
use Altaist\Parser\Transport\TextSource;




class TagCounterExample{
	public function run(){
		try {
			$parserBuilder = (new ParserBuilder())
				->setTransportClass(FromTextTransport::class)
				->setStorageClass(TagStorage::class)
				->setProcessorClass(TagCounterProcessor::class)
				->setParserClass(TagCounterParser::class);

			$parser = $parserBuilder->build();

			$resultData = $parser->parse(new TextSource("<br><p></p><p>"));
			$result = new ParseResultFormatter($resultData);
			
			print_r($result->getAsArray());
			
		} catch (TransportException $th) {
			// TODO
			print_r($th->getMessage());
			
		} catch (ParseException $th) {
			// TODO
			print_r($th->getMessage());
		}
		

	}
}
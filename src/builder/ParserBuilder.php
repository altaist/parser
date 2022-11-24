<?php
namespace Altaist\Parser\Builder;

/**
 * Creates parser by parser (IParser), transport (ITransport), processor(ITextProcessor), storage(IStorage) classes
 *  
 **/
class ParserBuilder extends BaseParserBuilder{
	/**
	 * @var PREG_RULES Constant with preg used by TextProcessor
	 */
	const PREG_RULES = "#<\w*?>+?#im";
	
	private $transportClass = null;
	private $storageClass = null;
	private $processorClass = null;
	private $parserClass = null;


	public function setTransportClass($transportClass): self{
		$this->transportClass = $transportClass;
		return $this;
	}
	public function setProcessorClass($processorClass): self{
		$this->processorClass = $processorClass;
		return $this;
	}
	public function setStorageClass($storageClass): self{
		$this->storageClass = $storageClass;
		return $this;
	}
	public function setParserClass($parserClass): self
	{
		$this->parserClass = $parserClass;
		return $this;
	}
	/**
	 * Creates parser.
	 * @return IParser
	 **/	
	public function build(){
		$transport = new $this->transportClass();
		$storage = new $this->storageClass();
		$processor = new $this->processorClass($storage, self::PREG_RULES);
		
		$parser = new $this->parserClass($transport, $processor);
		return $parser;
	}
}
<?php
namespace Altaist\Parser\Builder;

class ParserBuilder{
	
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
		$processor = new $this->processorClass($storage);
		
		$parser = new $this->parserClass($transport, $processor);
		return $parser;
	}
}
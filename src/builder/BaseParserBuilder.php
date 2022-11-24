<?php
namespace Altaist\Parser\Builder;

use Altaist\Parser\Contract\IStorage;
use Altaist\Parser\Contract\ITextProcessor;
use Altaist\Parser\Contract\ITRansport;
use Altaist\Parser\Parser;
use Altaist\Parser\Parser\TagParser;

abstract class BaseParserBuilder{

	private $transport = null;
	private $storage = null;
	private $processor = null;
	
	abstract public function build();

	//
	public function setTransport(ITransport $transport): BaseParserBuilder{
		$this->transport = $transport;
		return $this;
	}
	public function setProcessor(ITextProcessor $processor): BaseParserBuilder{
		$this->processor = $processor;
		return $this;
	}
	public function setStorage(IStorage $storage): BaseParserBuilder{
		$this->storage = $storage;
		return $this;
	}
	
}
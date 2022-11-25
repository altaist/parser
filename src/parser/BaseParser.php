<?php

namespace Altaist\Parser\Parser;

use Altaist\Parser\Contract\IParser;
use Altaist\Parser\Contract\IParseResultFormatter;

use Altaist\Parser\Contract\ITextProcessor;
use Altaist\Parser\Contract\ITransport;
use Altaist\Parser\Contract\ITransportSource;

abstract class BaseParser implements IParser
{

	private $transport = null;
	private $processor = null;
	
	
	/**
	 * Creates with extarnal helpers
	 **/
	public function __construct(ITRansport $transport, ITextProcessor $processor)
	{
		$this->transport = $transport;
		$this->processor = $processor;
	}
	
	protected function getTransport(): ITransport{
		return $this->transport; 
	}
	protected function getProcessor(): ITextProcessor{
		return $this->processor; 
	}

}

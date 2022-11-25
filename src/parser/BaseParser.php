<?php

namespace Altaist\Parser\Parser;

use Altaist\Parser\Contract\IParser;
use Altaist\Parser\Contract\IParseResultFormatter;

use Altaist\Parser\Contract\ITextProcessor;
use Altaist\Parser\Contract\ITransport;
use Altaist\Parser\Contract\ITransportSource;
	/**
	 * Базовый класс для парсеров 
	 * Использует в работе транспорт ITransport для получения данных, процессор IProcessor для парсинга, возвращает хранилище IStorage
	 * Инициализируется билдером 
	 * 
	 **/
abstract class BaseParser implements IParser
{

	private $transport = null;
	private $processor = null;
	
	
	/**
	 * Вызывается билдером, передаются подготовленные объекты
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

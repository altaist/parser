<?php
namespace Altaist\Parser\Parser;

use Altaist\Parser\Contract\IParseResultFormatter;
use Altaist\Parser\Contract\IStorage;
use Altaist\Parser\Contract\ITransportSource;


class TagCounterParser extends BaseParser{
	
	
	/**
	 * Парсит строку и возвращает список тегов с количеством их упоминания в тексте
	 * Использует транспорт ITransport для получения данных, процессор IProcessor для парсинга, возвращает хранилище IStorage
	 * Инициализируется билдером 
	 *	 
	 * @param string $source Source path (my be url or local path string)
	 * @return IStorage
	 * @throws ParseWrongSourceException, ParseProcessException
	 **/
	public function parse(ITransportSource $parserSource): IStorage
	{		
		$loadedText = $this->getTransport()->load($parserSource);
		$storage = $this->getProcessor()->parse($loadedText);
		
		return $storage;
	}
}
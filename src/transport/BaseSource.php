<?php

namespace Altaist\Parser\Transport;

use Altaist\Parser\Contract\ITransport;
use Altaist\Parser\Contract\ITransportSource;

/**
 * Базовый абстрактный класс для представления адресов. 
 * 
 * Реализует простую функциональность хранения адреса в текстовом виде. Оставляет абстрактным метод 
 * validateAddress() из ITransportAddress.
 * 
 * @implements ITransportSource
 */
abstract class BaseSource implements ITransportSource
{
	private $url;
	public function __construct($url)
	{
		$this->url = $url;
	}

	public function getSource(): string
	{
		return $this->url;
	}


}

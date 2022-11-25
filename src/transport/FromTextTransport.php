<?php
namespace Altaist\Parser\Transport;

use Altaist\Parser\Contract\ITransport;
use Altaist\Parser\Contract\ITransportSource;

/**
 * Транспорт для тестирования.
 * Реализует ITransport. "Подгружает" контент непосредственно из тестового поля адрес, без обращения к внешним источникам
 *  
 * @implements ITransport
 */
class FromTextTransport implements ITransport{
	/**
	 * Implements ITransport load() method with simple functionality
	 * @param ITransportSource $source Address data object
	 * @return Source's address
	 */

	public function load(ITransportSource $address): string{
		return $address->getSource();
	}
}
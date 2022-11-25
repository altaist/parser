<?php
namespace Altaist\Parser\Transport;

use Altaist\Parser\Contract\ITransport;
use Altaist\Parser\Contract\ITransportSource;
use Altaist\Parser\Exception\TransportException;

/**
 * Класс загрузки контента через интернет-протоколы.
 * Реализует интерфейсный метод load(ITransportAddress $source)
 *  
 * @implements ITransport
 */
abstract class InternetTransport implements ITransport{
	/**
	 * Абстрактный метод для выполнения операции загрузки
	 */
	abstract protected function loadByTransport(ITransportSource $source);
	
	/**
	 * Реализация зазгрузки контента. Метод интерфейса ITransport
	 * @param ITransportSource $source Internet source source
	 * @return string
	 * @throws TransportException
	 */
	public function load(ITransportSource $source):string
	{
		$this->checkAddress($source);
		return $this->loadByTransport($source);
	}
	
 	protected function checkAddress($source){
		if (!$source->validate()) {
			throw new TransportException("Wrong internet source {$source->getSource()}");
		}
	}
	

}
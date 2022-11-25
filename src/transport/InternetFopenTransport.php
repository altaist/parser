<?php
namespace Altaist\Parser\Transport;

use Altaist\Parser\Contract\ITransport;
use Altaist\Parser\Contract\ITransportSource;
use Altaist\Parser\Exception\TransportException;

/**
 * Класс загрузки контента через curl.
 */
class InternetFopenTransport extends InternetTransport{
	
	/**
	 * Загрузка с использованием curl
	 */
	function loadByTransport(ITransportSource $source){
		$url = $source->getSource();
		$file = fopen($url, "r");
		if (!$file) {
			throw new TransportException("Wrong source. Cann't load remote data", "Wrong opening file '$url'");
		}
		try {
			$result = fgets($file);
		} catch (\Throwable $th) {
			fclose($file);
			throw $th;
		}
		return $result;
		
	}

}
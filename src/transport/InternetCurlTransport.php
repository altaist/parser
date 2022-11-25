<?php
namespace Altaist\Parser\Transport;

use Altaist\Parser\Contract\ITransport;
use Altaist\Parser\Contract\ITransportSource;
use Altaist\Parser\Exception\TransportException;

/**
 * Класс загрузки контента через curl.
 */
class InternetCurlTransport extends InternetTransport{
	
	/**
	 * Загрузка с использованием curl
	 */
	function loadByTransport(ITransportSource $source){
		$url = $source->getSource();
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
		
	}

	/**
	 * Загрузка с использованием fopen
	 */
	protected function loadByFopen($url): string{
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
<?php
namespace Altaist\Parser\Transport;


/**
 * Класс для работы с адресом HTTP/HTTPS
 * Реализует абстрактный метод класса BaseAddress
 *  
 * */

class InternetSource extends BaseSource
{
	public function validate(): bool 
	{
		$url = $this->getSource();
		return !empty($url) && (preg_match("#^http://|^https://\w+\.\w+#", $url));
	}	
}

<?php
namespace Altaist\Parser\Transport;

/**
 * Класс для передачи текстового контента, передаваемого для Транспорта через поле поля $source. 
 * Требуется при отладке. Например, FakeTransport обрабатывает контент, передаваемый в поле адрес;
 */

class TextSource extends BaseSource
{
	public function validate(): bool
	{
		return !empty($this->getSource());
	}
	
}

<?php
namespace Altaist\Parser\Storage;

use Altaist\Parser\Contract\IStorageItem;

/**
 * Класс для хранения информации по каждому найденному тегу. Реализует методы интерфейса IStorageItem
 * @implements IStorageItem
 */
class TagHolder implements IStorageItem {
	private $key;
	private $description;
	private $counter;
	
	public function __construct($key, $value, $description=null)
	{
		$this->key = $key;
		$this->counter = $value;
		$this->description = $description;
		
	}
	public function incrementValue()
	{
		$this->counter++;
	}
	
	public function getKey(): string{
		return $this->key;
	}
	public function getValue(): string{
		return $this->counter;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	
}
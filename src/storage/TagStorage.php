<?php
namespace Altaist\Parser\Storage;

use Altaist\Parser\Contract\IStorage;
use Altaist\Parser\Contract\IStorageItem;
use Altaist\Parser\Exception\ParseException;

/**
 * Класс для хранения результатов парсинга. Реализует методы интерфейса IStorage
 * @implements IStorage
 */
class TagStorage implements IStorage{
	
	private $map = [];
	
	public function set(string $key, IStorageItem $item) {
		
		if(!$this->check($key)){
			$this->map[$key] = $item;
		}
	}
	public function check($key): bool{
		return isset($this->map[$key]); 
	}
	
	public function get($key):?TagHolder{
		if(!$this->check($key)){
			return null;
		}		
		return $this->map[$key];
	}
	
	public function getMap(){
		return $this->map;
	}
	
}
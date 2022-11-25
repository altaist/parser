<?php
namespace Altaist\Parser\Formatter;

use Altaist\Parser\Contract\IParseResultFormatter;
use Altaist\Parser\Contract\IStorage;
use Altaist\Parser\Contract\IStorageItem;
/**
 * Класс для представления и форматирования результатов из Storage
 */

class ParseResultFormatter implements IParseResultFormatter{
	private $storage = null;
	
	public function __construct(IStorage $storage){
		$this->setStorage($storage);
	}
	
	/**
	 * @param IStorage $storage 
	 * @return self
	 */
	public function setStorage(IStorage $storage): self {
		$this->storage = $storage;
		return $this;
	}	
	
	/**
	 * @return IStorage
	 */
	public function getStorage(): IStorage{
		return $this->storage;
	}

	public function getAsArray(): array{
		$storageArr = $this->storage->getMap();
		if(!$storageArr || count($storageArr)==0){
			return [];
		}
		$resultArr = [];
		foreach ($storageArr as $key => $holder) {
			$resultArr[$key] = $holder->getValue();
		}		
		
		return $resultArr;
	}
	protected function arrayMapper(string $key, IStorageItem $holder){
		return "Tag $key - {$holder->getValue()}";
	}
	
	public function getAsText(): string{
		return (string) $this->getAsArray();
	}
	public function getAsJson(): string{
		return "TODO";
	}
	public function getAsHtml(): string{
		return "TODO";
	}


}
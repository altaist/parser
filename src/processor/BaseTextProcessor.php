<?php
namespace Altaist\Parser\Processor;

use Altaist\Parser\Contract\IParseResultFormatter;
use Altaist\Parser\Contract\IStorage;
use Altaist\Parser\Contract\ITextProcessor;
use Altaist\Parser\Processor\ParseResultFormatter;

/**
 * Абстрактный класс для текстовых процессоров. Реализует интерфейсный метод parse
 * Абстрактные методы search и processMatached должны быть реализованы в наследуемых процессорах
 */
abstract class BaseTextProcessor implements ITextProcessor{
	/**
	 * Абстрактный метод для поиска вхождений
	 */
	protected abstract function search(string $textToSearch): ?array;
	/**
	 * Абстрактный метод для обработки найденный вхождений (использует ISTorage лдя хранения)
	 */protected abstract function processMatched(string $entity): void;
	
	private $pregRule = " ";
	private $storage = null;
	private $maxMatches = 0;
	
	/**
	 * Конструктор объекта
	 * @param IStorage $storage Менеджер хранилища результатов 
	 * @param string $pregRule Маска для поиска 
	 */
	public function __construct(IStorage $storage)
	{
		$this->storage = $storage;
	}
	
	/**
	 * Обрабатывает контент и передает результат в виде объекта методами интерфейса IParseResult
	 * Вызываются два абстрактных метода для поиска и обработки найденных подстрок.
	 * 
	 * @param string $text Текст для поиска
	 * @return \Altaist\Parser\Formatter\ParseResultFormatter implemented IParseResult 
	 */
	public function parse(string $text): IStorage{
		
		// Searching
		$matches = $this->search($text);
		if($matches){
			foreach ($matches as $tagName) {
				// Processing and saving results to IStorage if needed
				$this->processMatched($tagName);
			}			
		}
		// Result is an internal storage
		return $this->getStorage();
	}

	public function getStorage(): ?IStorage{
		return $this->storage;
	}
	public function setPregRule($rule){
		$this->pregRule = $rule;
	}
	public function setMaxMatches($val){
		$this->maxMatches = $val;
	}
	public function getPregRule(){
		return $this->pregRule;
	}
	public function getMaxMatches(){
		return $this->maxMatches;
	}
	

}
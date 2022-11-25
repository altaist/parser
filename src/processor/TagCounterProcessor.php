<?php
namespace Altaist\Parser\Processor;

use Altaist\Parser\Contract\IParseResultFormatter;
use Altaist\Parser\Contract\ITextProcessor;
use Altaist\Parser\Storage\TagHolder;
use Altaist\Parser\Storage\TagStorage;
use Altist\Parser\Proccessor\ParseResult;
/**
 * Класс для анализа найденных фрагментов текста и подсчета количества найденных тегов
 */
class TagCounterProcessor extends BaseTextProcessor{
	
	/**
	 * @const PREG_RULES used by TextProcessor
	 */
	const PREG_RULES = "#<\w*?>+?#im";

	/**
	 * Возвращает массив найденных тегов возвращает
	 * 
	 * @return array|null
	 */
	protected function search($text): ?array
	{
		if (!$this->getPregRule()) {
			return null;
		}
		$result = [];
		$matchedNum = preg_match_all(self::PREG_RULES, $text, $result);
		if(!$matchedNum || !is_array($result) || count($result)<1){
			return null;
		}
		return $result[0];
	}

	
	protected function processMatched($tagName):void{
		$holder = $this->getStorage()->get($tagName);
		if (!$holder) {
			$holder = new TagHolder($tagName, 0);
			$this->getStorage()->set($tagName, $holder);
		}
		$holder->incrementValue();
	}

}
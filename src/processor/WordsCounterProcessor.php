<?php
namespace Altaist\Parser\Processor;

use Altaist\Parser\Contract\IParseResultFormatter;
use Altaist\Parser\Contract\ITextProcessor;
use Altaist\Parser\Processor\ParseResultFormatter;

class WordsCounterProcessor extends BaseTextProcessor{
	
	protected function search($text): ?array{
		if(!$this->getPregRule()){
			return null;
		}
		return preg_split($this->getPregRule(), $text, $this->getMaxMatches());
	}
	protected function processMatched($entity): void
	{
		$this->storage->set($entity);
	}
}
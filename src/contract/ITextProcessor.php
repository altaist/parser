<?php
namespace Altaist\Parser\Contract;


interface ITextProcessor
{
	public function parse(string $text): IStorage;
}

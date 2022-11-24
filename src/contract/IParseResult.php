<?php

namespace Altaist\Parser\Contract;

interface IParseResult
{
	public function getStorage(): IStorage;
	public function getAsArray(): array;
	public function getAsText(): string;
	public function getAsJson(): string;
	public function getAsHtml(): string;
}

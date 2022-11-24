<?php

namespace Altaist\Parser\Contract;

interface IParser
{
	public function parse(ITransportSource $source): IParseResult;
}

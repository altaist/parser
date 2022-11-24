<?php

namespace Altaist\Parser\Contract;

interface IStorageItem
{
	public function getKey(): string;
	public function getValue(): string;
}

<?php
namespace Altaist\Parser\Contract;

interface IStorage
{
	public function set(string $key, IStorageItem $value);
	public function get(string $key);
	public function getMap();
}

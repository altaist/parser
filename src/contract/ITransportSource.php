<?php
namespace Altaist\Parser\Contract;

interface ITransportSource
{
	public function getSource():string;
	public function validate(): bool;
}

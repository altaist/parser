<?php
namespace Altaist\Parser\Contract;

interface ITransportSource
{
	public function getAddress():string;
	public function validateAddress(): bool;
}

<?php
namespace Altaist\Parser\Contract;

interface ITransport{
	public function load(ITransportSource $source);
}
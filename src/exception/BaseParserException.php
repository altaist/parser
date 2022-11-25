<?php
namespace Altaist\Parser\Exception;

use Exception;
use Throwable;

class BaseParserException extends Exception
{
	private $publicMessage;
	private $logMessage;

	public function __construct(string $publicMessage, string $logMessage=null, int $code =0)
	{
		parent::__construct($publicMessage, $logMessage);
		$this->publicMessage = $publicMessage;
		$this->logMessage = $logMessage;
		$this->code = $code;
	}
	
	function getPublicMessage(){
		return $this->publicMessage;
	}
	function setPublicMessage($publicMessage){
		$this->publicMessage = $publicMessage;
	}
	
	function getLogMessage(){
		return $this->logMessage;
	}
	function setLogMessage($logMessage){
		$this->logMessage = $logMessage;
	}
	

}

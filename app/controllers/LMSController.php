<?php

class LMSController extends BaseController {

	
	
	public function initialize()
	{
		
		$response = Response::make('Hello World');
		return $response;
	}
	
	public function getValue($varName)
	{
		$result = "no result";
		return $result;
	}
	
	public function setValue($varName, $varValue)
	{
		$result = "no result";
		return $result;
	}
	
	public function getCommit($str)
	{
		$result = "no result";
		return $result;
	}
	
	public function getFinish($str)
	{
		$result = "no result";
		return $result;
	}
	
	public function getLastError()
	{
		$result = "no result";
		return $result;
	}
	
	public function getDiagnostic($errorCode)
	{
		$result = "no result";
		return $result;
	}
	
	public function getErrorString($errorCode)
	{
		$result = "no result";
		return $result;
	}
}
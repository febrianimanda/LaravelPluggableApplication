<?php

class LMSController extends BaseController {

	
	
	public function initialize()
	{
		
		$response = Response::make('Hello World');
		return $response;
	}
	
	public function getValue($varname)
	{
		$result = "no result";
		return $result;
	}
	
	public function setValue($varname)
	{
		$data = file_get_contents('php://input');
		$result = "no result";
		return $result;
	}
	
	public function getCommit()
	{
		$result = "no result";
		return $result;
	}
	
	public function getFinish()
	{
		$result = "no result";
		return $result;
	}
	
	public function getLastError()
	{
		$result = "no result";
		return $result;
	}
	
	public function getDiagnostic($errorcode)
	{
		$result = "no result";
		return $result;
	}
	
	public function getErrorString($errorcode)
	{
		$result = "no result";
		return $result;
	}
}
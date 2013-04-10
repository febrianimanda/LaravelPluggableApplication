<?php

class LMSController extends BaseController {

	
	
	public function initialize()
	{
		$response = Response::make('Hello World');
		return $response;
	}
	
	public function getValue($varname)
	{
		if ($varname == 'cmi.core._children') {
			return "student_id,student_name,lesson_location,credit,lesson_status,entry,score,total_time,exit,session_time";
		} else if ($varname == 'cmi.core.student_id'){
		}else if ($varname == 'cmi.core.student_name'){
		}else if ($varname == 'cmi.core.session_time'){
		}else if ($varname == 'cmi.core.total_time'){
		}else if ($varname == 'cmi.core.score._children'){
		}else if ($varname == 'cmi.core.score.raw'){
		}else if ($varname == 'cmi.core.lesson_location'){
		}else if ($varname == 'cmi.core.credit'){
		}else if ($varname == 'cmi.core.lesson_status'){
		}else if ($varname == 'cmi.core.entry'){
		}else if ($varname == 'cmi.core.exit'){
		}else if ($varname == 'cmi.suspend_data'){
		}else if ($varname == 'cmi.launch_data'){
		}else if ($varname == 'cmi.completion_status'){
		}else if ($varname == 'cmi.success_status'){
		}
			
		
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
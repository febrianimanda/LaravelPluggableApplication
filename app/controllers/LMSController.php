<?php

class LMSController extends BaseController {
	
	/*
	* Used by a lms to intialize a learning session
	* 
	*/	
	public function initialize($module)
	{
	
		
		$learningSession = LearningSession::create(array('cmi_core_student_id' =>  Auth::user()->id, 'sco_id'=>$module, 'cmi_core_student_name' => Auth::user()->lastname));
		$learningSession->save();
		
		Session::put('actualSession', $learningSession->id);
		
		$response = Response::make(Session::get('actualSession'));
		return $response;
	}
	
	/*
	* Used by a lms toset a value for the session
	* 
	*/
	public function getValue($varname)
	{
		$liveSession = Session::get('actualSession');
		$learningSession = LearningSession::find((int)$liveSession);
		if (isset($learningSession) && $learningSession != null){
			//explose variable name with '.' separator for targeted use 
			$scormProperty = explode('.', $varname);
			if ($scormProperty[0] != 'cmi'){
				//TODO : catch exception
				$result = "not a valid scom property";
			}else{
				if ($scormProperty[1] == 'core'){
					switch ($scormProperty[2]){
						case 'student_id':
							$result = $learningSession->cmi_core_student_id;
							break;
						case '_children':
							$result = "student_id,student_name,lesson_location,credit,lesson_status,entry,score,total_time,exit,session_time";
							break;
						case 'student_name':
							$result = $learningSession->cmi_core_student_name;
							break;
						case 'session_time':
							$result = $learningSession->cmi_core_session_time; 
							break;
						case 'total_time':
							$result = $learningSession->cmi_core_total_time;
							break;
						case 'lesson_location':
							$result = $learningSession->cmi_core_lesson_location;
							break;
						case 'credit':
							$result = $learningSession->cmi_core_credit;
							break;
						case 'lesson_status':
							$result = $learningSession->cmi_core_lesson_status;
							break;
						case 'lesson_mode':
							$result = $learningSession->cmi_core_lesson_mode;
							break;
						case 'entry':
							$result = $learningSession->cmi_core_entry;
							break;
						case 'exit':
							$result = $learningSession->cmi_core_exit;
							break;
					}
				
				}elseif($scormProperty[1] == 'suspend_data'){
					$result = $learningSession->cmi_suspend_data;
				}elseif($scormProperty[1] == 'success_status'){
					$result = $learningSession->cmi_success_status;
				}elseif($scormProperty[1] == 'launch_data'){
					$result = $learningSession->cmi_launch_data;
				}elseif($scormProperty[1] == 'completion_status'){
					$result = $learningSession->cmi_completion_status;
				}elseif($scormProperty[1] == 'interactions'){
					if  ($scormProperty[2]== '_count'){
						$result = $learningSession->cmi_interactions_count;
					}else{
						$scormInteraction = LearningInteraction::where(array('num'=>$scormProperty[2], 'sessions_id'=>$learningSession->id));
					}
					
				}elseif($scormProperty[1] == 'score'){
					switch ($scormProperty[2]){
						case '_children':
							$result = $learningSession->cmi_core_student_id;
							break;
						case 'raw':
							$result = "student_id,student_name,lesson_location,credit,lesson_status,entry,score,total_time,exit,session_time";
							break;
						case 'max':
							$result = $learningSession->cmi_core_student_name;
							break;
						case 'min':
							$result = $learningSession->cmi_core_session_time; 
							break;
					}
				}
				
			}
			$result =$learningSession->id;
		}else{
			$result = 'session lost : '.(int)$liveSession;
		}
		return Response::make($result);
	}
	
	public function setValue($varname)
	{
		$liveSession = Session::get('actualSession');
		$learningSession = LearningSession::find($liveSession);
		if (isset($learningSession) && $learningSession != null){
			
			$data = file_get_contents('php://input');
			/*
			
			$scormProperty = explode('.', $varname);
			if ($scormProperty[0] != 'cmi'){
				//TODO : catch exception
				$result = "not a valid scom property";
			}else{
				if ($scormProperty[1] == 'core'){
					switch ($scormProperty[2]){
						case 'student_id':
							$learningSession->cmi_core_student_id = $data;
							break;
						case 'student_name':
							$learningSession->cmi_core_student_name = $data;
							break;
						case 'session_time':
							$learningSession->cmi_core_session_time = $data; 
							break;
						case 'total_time':
							$learningSession->cmi_core_total_time = $data;
							break;
						case 'lesson_location':
							$learningSession->cmi_core_lesson_location = $data;
							break;
						case 'credit':
							$learningSession->cmi_core_credit = $data;
							break;
						case 'lesson_status':
							$learningSession->cmi_core_lesson_status = $data;
							break;
						case 'lesson_mode':
							$learningSession->cmi_core_lesson_mode = $data;
							break;
						case 'entry':
							$learningSession->cmi_core_entry = $data;
							break;
						case 'exit':
							$learningSession->cmi_core_exit = $data;
							break;
					}
				
				}elseif($scormProperty[1] == 'suspend_data'){
					$learningSession->cmi_suspend_data = $data;
				}elseif($scormProperty[1] == 'success_status'){
					$learningSession->cmi_success_status = $data;
				}elseif($scormProperty[1] == 'launch_data'){
					$learningSession->cmi_launch_data = $data;
				}elseif($scormProperty[1] == 'completion_status'){
					$learningSession->cmi_completion_status = $data;
				}elseif($scormProperty[1] == 'interactions'){
					if  ($scormProperty[2]== '_count'){
						$learningSession->cmi_interactions_count = $data;
					}else{
						$scormInteraction = LearningInteraction::where(array('num'=>$scormProperty[2], 'sessions_id'=>$learningSession->id));
					}
					
				}elseif($scormProperty[1] == 'score'){
					switch ($scormProperty[2]){
						case '_children':
							$learningSession->cmi_core_score_children = $data;
							break;
						case 'raw':
							$learningSession->cmi_core_score_raw = $data;
							break;
						case 'max':
							$learningSession->cmi_core_score_max = $data;
							break;
						case 'min':
							$learningSession->cmi_core_score_min = $data;
							break;
					}
				}
				
			}
			$result = (string)($learningSession->save());
		}else{
			$result = 'session lost';
		}
		return Response::make($result);
			*/
			
			
			if ($varname == 'cmi.core._children' || $varname == 'cmi.core.student_id' || $varname == 'cmi.core.student_name') {
				return Response::make("not possible");
			}else {
				$tVarName =  str_replace(".", "_", $varname);
				$learningSession->fill(array($tVarName=>$data));
			}
			
			$learningSession->save();
			return Response::make($data);
			//return Response::make($result);
		}else{
			$result = 'session lost : '.$learningSession->id;
			return Response::make($result);
		}
		
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
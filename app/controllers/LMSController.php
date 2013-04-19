<?php

class LMSController extends BaseController {
	
	/*
	* Used by a lms to intialize a learning session
	* 
	*/	
	public function initialize($module)
	{
		$studentName = Auth::user()->lastname.','.Auth::user()->firstname;
		$learningSession = LearningSession::create(array('cmi_core_student_id' =>  Auth::user()->id, 'sco_id'=>$module, 'cmi_core_student_name' => $studentName));
		$learningSession->save();
		Session::put("sess",$learningSession->id);
		
		$response = Response::make("true");
		return $response;
	}
	
	/*
	* Used by a lms to set a value for the session
	* 
	*/
	public function getValue($varname)
	{
		$t= Session::get("sess");
		$learningSession = LearningSession::find($t);
		
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
						case 'score':
							switch ($scormProperty[3]){
								case '_children':
									$result = "raw,min,max";
									break;
								case 'raw':
									$result = $learningSession->cmi_core_score_raw;
									break;
								case 'max':
									$result = $learningSession->cmi_core_score_max;
									break;
								case 'min':
									$result = $learningSession->cmi_core_score_min; 
									break;
							}
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
				}
			}
		}else{
			$result = 'session lost : '.$learningSession->id.'. Cant get value for variable : '.$varname;
		}
		return Response::make($result);
	}
	
	public function setValue($varname)
	{
		$t= Session::get("sess");
		$learningSession = LearningSession::find($t);
		
		if (isset($learningSession) && $learningSession != null){
			
			$data = file_get_contents('php://input');
			
			$scormProperty = explode('.', $varname);
			if ($scormProperty[0] != 'cmi'){
				//TODO : catch exception
				$result = "not a valid scom property";
			}else{
				if ($scormProperty[1] == 'core'){
					switch ($scormProperty[2]){
						case 'student_id':
							$learningSession->cmi_core_student_id = (int)$data;
							$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' set to : '.(int)$data;
							break;
						case 'student_name':
							$learningSession->cmi_core_student_name = (string)$data;
							$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' set to : '.(string)$data;
							break;
						case 'session_time':
							$learningSession->cmi_core_session_time = (string)$data;
							$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' set to : '.(string)$data;
							break;
						case 'total_time':
							$learningSession->cmi_core_total_time = (string)$data;
							$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' set to : '.(string)$data;
							break;
						case 'lesson_location':
							$learningSession->cmi_core_lesson_location = (string)$data;
							$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' set to : '.(string)$data;
							break;
						case 'credit':
							$learningSession->cmi_core_credit = (string)$data;
							$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' set to : '.(string)$data;
							break;
						case 'score':
							switch ($scormProperty[3]){
								case '_children':
									$learningSession->cmi_core_score_children = (string)$data;
									$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].'-'.$scormProperty[3].' set to : '.$data;
									break;
								case 'raw':
									$learningSession->cmi_core_score_raw = $data;
									$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].'-'.$scormProperty[3].' set to : '.$data;
									break;
								case 'max':
									$learningSession->cmi_core_score_max = $data;
									$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].'-'.$scormProperty[3].' set to : '.$data;
									break;
								case 'min':
									$learningSession->cmi_core_score_min = $data;
									$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].'-'.$scormProperty[3].' set to : '.$data;
									break;
								default:
									$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' could not be set to : '.$data;
							}
							break;
						case 'lesson_status':
							$learningSession->cmi_core_lesson_status = (string)$data;
							$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' set to : '.(string)$data;
							break;
						case 'lesson_mode':
							$learningSession->cmi_core_lesson_mode = (string)$data;
							$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' set to : '.(string)$data;
							break;
						case 'entry':
							$learningSession->cmi_core_entry = (string)$data;
							$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' set to : '.(string)$data;
							break;
						case 'exit':
							$learningSession->cmi_core_exit = (string)$data;
							$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' set to : '.(string)$data;
							break;
						default:
							$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' could not be set to : '.(string)$data;
					}
				
				}elseif($scormProperty[1] == 'suspend_data'){
					$learningSession->cmi_suspend_data = (string)$data;
					$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].' set to : '.(string)$data;
				}elseif($scormProperty[1] == 'success_status'){
					$learningSession->cmi_success_status = (string)$data;
					$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].' set to : '.(string)$data;
				}elseif($scormProperty[1] == 'launch_data'){
					$learningSession->cmi_launch_data = (string)$data;
					$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].' set to : '.(string)$data;
				}elseif($scormProperty[1] == 'completion_status'){
					$learningSession->cmi_completion_status = (string)$data;
					$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].' set to : '.(string)$data;
				}elseif($scormProperty[1] == 'interactions'){
					if  ($scormProperty[2]== '_count'){
						$learningSession->cmi_interactions_count = (int)$data;
						$result = 'Value'.$scormProperty[0].'-'.$scormProperty[1].'-'.$scormProperty[2].' set to : '.(int)$data;
					}else{
						$scormInteraction = LearningInteraction::where(array('num'=>$scormProperty[2], 'sessions_id'=>$learningSession->id));
					}
					
				}
				
			}
			$learningSession->save();
		}else{
			$result = 'session lost : '.$t.'. Cant get value for variable : '.$varname;
		}
		return Response::make($result);
	}
	
	public function getCommit()
	{
		$result = "no result";
		return $result;
	}
	
	public function getFinish()
	{
		$t= Session::get("sess");
		$learningSession = LearningSession::find($t);
		
		$sessionTime = $learningSession->cmi_core_session_time;
		$time = explode(':',$sessionTime);
		$sessionSeconds = $time[0]*60*60 + $time[1]*60 + $time[2];
		$totalSeconds += $sessionSeconds;
		// break total time into hours, minutes and seconds
		$totalHours = intval($totalSeconds/3600);
		$totalSeconds -= $totalHours * 3600;
		$totalMinutes = intval($totalSeconds/60);
		$totalSeconds -= $totalMinutes * 60;
		// reformat to comply with the SCORM data model
		$totalTime = sprintf("%04d:%02d:%02d",$totalHours,$totalMinutes,$totalSeconds);

		$learningSession->cmi_core_total_time = $totalTime;
		$learningSession->save();
		Session::flush();
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
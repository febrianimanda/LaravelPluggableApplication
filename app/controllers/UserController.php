<?php

class UserController extends BaseController {

	public function getUserLogin()
	{
		return View::make('login');
	}
	
	/*Basic Login*/ 
	public function postUserLogin()
	{
		$rules = array(
			'username' => array('required'),
			'password' => array('required')
		);
	 
		$validation = Validator::make(Input::all(), $rules);
	
		if ($validation->fails()){
			return Redirect::to('login')->withErrors($validator);
		}else{
		
			$username = Input::get('username');
			$password = Input::get('password');
			
			$credentials = array('username' => $username, 'password' => $password);

			if (Auth::attempt($credentials))
			{
				return Redirect::to('userhome');
			}
			else
			{
				return Redirect::to('login')
					->with('message', 'not logged in !');
			}
		}
	}
	
	public function postUserVerification()
	{
		$rules = array(
			'user_verification_code' => array('required'),
			'verification_code' => array('required','same:user_verification_code')
		);
				
		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()){
			return View::make('verify');
		}else{
			$user = User::find($verification_code);
			return Redirect::home();
		}
	}
	
	public function getUserVerification($param)
	{
		$email = htmlentities($param);
		return View::make('home.verify')->with('email',$email);
	}
	public function getUserDisconnect()
	{
		Auth::logout();
		return Redirect::to('/');
	}
	
	
	/*Basic Signup */
	public function getUserSignUp()
	{
		return View::make('signup');
	}
	
	public function postUserSignUp()
	{
		Input::flash('except', array('password'));
		$rules = array(
			'firstname' => array('required', 'alpha'),
			'lastname' => array('required','alpha'),
			'username' => array('required','unique:users,username'),
			'email' => array('required','email','unique:users,email'),
			'password' => array('required','confirmed','min:7'),
			'Field' => array('accepted')
		);
	 
		$validation = Validator::make(Input::all(), $rules);
	
		if ($validation->fails()){
			return Redirect::to('signup')->withErrors($validation)->withInput();
		}else{
			$now = time();
			
			$bytes = openssl_random_pseudo_bytes(20);
			$hex = bin2hex($bytes);
			
			
			$user = User::create(array(
				'firstname' => Input::get('firstname'),
				'lastname' => Input::get('lastname'),
				'username' => Input::get('username'),
				'password' => Hash::make(Input::get('password')),
				'email' => Input::get('email'),
				'phone' => '',
				'job' => '',
				'role' => "",
				'about' => '',
				'city' => '',
				'country' => '',
				'portrait' => '',
				'birthdate' => '',
				'interests' => '',
				'credits' => '',
				'verification' => 'false',
				'verification_code' => ''.$hex,
				'certification' => 'false'));
			
			if ($user == false){	
				return Redirect::to('500');
			}else{
				$userId = $user->id;
				return Redirect::to('userhome');
			}
		}
	}
	
	/* Signup with Twitter account */ 
	public function getUserSignUpTwitter()
	{
		return Redirect::route('home');
	}
	
	/* Signup with Facebook account */ 
	public function getUserSignUpFacebook()
	{
		return Redirect::route('home');
	}
}
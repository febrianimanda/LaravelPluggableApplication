@extends('layout.homelayout')

@section('header')
	@include('parts.homeheader')
@stop

@section('content')
	<div class="account-container">
	
	<div class="content clearfix">
		{{ Form::open(array('action' => 'login', 'method' => 'POST' )) }}
		
			<h1>Sign In</h1>		
			
			<div class="login-fields">
				
				<p>Sign in using your registered account:</p>
				
				<div class="field">
					<label for="username">Username:</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
				
				{{ Form::submit('Sign In', array('class' => 'button btn btn-warning btn-large')) }}				
				
			</div> <!-- .actions -->
		
		{{ Form::close()}}
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
	Don't have an account? <a href="./signup">Sign Up</a><br/>
	Remind <a href="./password">Password</a>
</div> <!-- /login-extra -->
@stop

@section('footer')
	@include('parts.footer')
@stop


@extends('layout.homelayout')

@section('header')
	@include('parts.homeheader')
@stop

@section('content')
	<div class="account-container register">
	
	<div class="content clearfix">
		
		{{ Form::open(array('action' => 'signup', 'method' => 'POST' )) }}
		
			<h1>Create Your Account</h1>			
			
			<div class="login-fields">
				
				<p>Create your free account:</p>
				
				<div class="field">
					<label for="firstname">First Name:</label>
					<input type="text" id="firstname" name="firstname" value="<?php echo(Input::old('firstname')); ?>" placeholder="First Name" class="login" />
					@if ($errors->has('firstname'))
						<span id="firstnameError" class="forminfo" ></span>
					@endif
				</div> <!-- /field -->
				
				<div class="field">
					<label for="lastname">Last Name:</label>	
					<input type="text" id="lastname" name="lastname" value="<?php echo(Input::old('lastname')); ?>" placeholder="Last Name" class="login" />
					@if ($errors->has('lastname'))
					<span id="lastnameError" class="forminfo" ></span>
					@endif
				</div> <!-- /field -->
				
				<div class="field">
					<label for="username">User Name:</label>	
					<input type="text" id="username" name="username" value="<?php echo(Input::old('username')); ?>" placeholder="User Name" class="login" />
					@if ($errors->has('username'))
					<span id="usernameError" class="forminfo" ></span>
					@endif
				</div> <!-- /field -->
				
				<div class="field">
					<label for="email">Email Address:</label>
					<input type="text" id="email" name="email" value="<?php echo(Input::old('email')); ?>" placeholder="Email" class="login"/>
					@if ($errors->has('firstname'))
					<span id="emailError" class="forminfo" ></span>
					@endif
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="<?php echo(Input::old('password')); ?>" placeholder="Password" class="login"/>
					@if ($errors->has('password'))
					<span id="passwordError" class="forminfo" ></span>
					@endif
				</div> <!-- /field -->
				
				<div class="field">
					<label for="confirm_password">Confirm Password:</label>
					<input type="password" id="confirmPassword" name="confirmPassword" value="<?php echo(Input::old('confirmPassword')); ?>" placeholder="Confirm Password" class="login"/>
					@if ($errors->has('confirmPassword'))
					<span id="confirmPasswordError" class="forminfo" ></span>
					@endif
				</div> <!-- /field -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label id="terms" class="choice" for="Field">I have read and agree with the Terms of Use.</label>
				</span>
									
				<button class="button btn btn-primary btn-large">Register</button>
				
			</div> <!-- .actions -->
			
		{{ Form::close()}}
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
	Already have an account? <a href="./login">Login</a>
</div> <!-- /login-extra -->


<!-- Text Under Box -->
<div class="login-extra">
	Remind <a href="./password">Password</a>
</div> <!-- /login-extra -->
@stop

@section('footer')
	@include('parts.footer')
@stop


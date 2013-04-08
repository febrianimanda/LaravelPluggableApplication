@extends('layout.layout')

@section('header')
	@include('parts.header')
@stop

@section('content')
<!-- Page Title -->
        <div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <i class="icon-user page-title-icon"></i>
				<h2>John DOE /</h2>
                        <p>Manager</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Us Text -->
        <div class="about-us container">
            <div class="row">
			<div class="about-us-text span4">
                    <h4>About Andia</h4>
                    <h4>Our Mission</h4>
                    <h4>Why Choose Us</h4>
                  </div>
                <div class="about-us-text span7">
                    <h4>About Andia</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper <span class="violet">suscipit lobortis</span> nisl ut aliquip ex ea commodo consequat. Lorem ipsum <strong>dolor sit amet</strong>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <strong>eiusmod tempor</strong> incididunt.</p>
                    <h4>Our Mission</h4>
                    <p>Lorem ipsum dolor sit amet, <span class="violet">consectetur adipisicing</span> elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, <strong>consectetur adipisicing</strong> elit, sed do eiusmod <span class="violet">tempor incididunt</span> ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                    <h4>Why Choose Us</h4>
                    <p>Lorem ipsum dolor sit amet, <strong>consectetur adipisicing elit</strong>, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis <span class="violet">nostrud exerci</span> tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                </div>
            </div>
        </div>
@stop

@section('footer')
	@include('parts.footer')
@stop



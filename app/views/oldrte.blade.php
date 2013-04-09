@extends('layout.modulelayout')

@section('header')
	@include('parts.header')
@stop

@section('content')
	<?php 
		$url = $module->url;
		echo ("<script>window.open('".URL::asset('assets/'.$url )."');</script>");
	?>
@stop

@section('footer')
	@include('parts.footer')
@stop
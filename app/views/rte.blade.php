@extends('layout.modulelayout')

@section('header')
	@include('parts.header')
@stop

@section('content')
	<?php $url = $module->url;
		echo (Session::put('viewModule', $module->id));
		echo ('<script> sess='.Session::get('viewModule').'; </script>');
		echo ('<H1> sess='.Session::get('viewModule').'; </H1>');
	?>
    <iframe frameborder="0" marginheight="0px" marginwidth="0px" height="1px" width="1px" border="0" src="<?php echo (URL::asset('assets/api.html')); ?>" name="API" seamless> </iframe>
    <iframe frameborder="0" marginheight="0px" marginwidth="0px" height="100%" width="100%" border="0" src="<?php echo URL::asset('assets/'.$url ); ?>" name="course" seamless></iframe>

@stop

@section('footer')
	@include('parts.footer')
@stop
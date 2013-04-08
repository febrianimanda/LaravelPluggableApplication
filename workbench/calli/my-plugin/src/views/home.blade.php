@extends('layout.layout')

@section('header')
	@include('parts.header')
@stop

@section('content')
<div class="presentation container">
    <h2>Ceci est une application <span class="violet">Modulaire</span> sous Laravel.</h2>
    <p>Elle sert à illustrer le concept d'application modulaire avec Laravel.</p>
    <br>
    <br>
    <br>
    <br>
    @foreach ($pluginList as $plugin)
            <div class="row">
                    <h4 class="filter-portfolio"><?php echo($plugin["pluginName"]);?></h4>
            </div>
	@endforeach
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>

<!-- Services -->
<div class="what-we-do container">

</div>
@stop

@section('footer')
	@include('parts.footer')
@stop
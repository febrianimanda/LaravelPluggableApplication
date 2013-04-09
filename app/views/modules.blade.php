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
                        <i class="icon-camera page-title-icon"></i>
				<h2>Modules /</h2>
				<p>Voici la liste de vos modules</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio -->
       
	  <div class="portfolio portfolio-page container">
	   @foreach ($foldersList as $folder)
            <div class="row">
                <div class="portfolio-navigator span12">
                    <h4 class="filter-portfolio"><?php echo($folder->name);?></h4>
                </div>
            </div>
		
		   
		
            <div class="row">
                <ul class="portfolio-img">
                    @foreach ($modulesList as $module)
				  @if ( $module->folders_id == $folder->id )
				  <li class="span3">
					<div class="work">
					    <?php 
							$moduleLink = $module->url;
							$moduleImg = $module->img;
						?>
							<a href="<?php echo "showmodule/".$module->id ?>"><img src="<?php echo URL::asset($moduleImg); ?>" alt=""></a>
							
					    
					    
					    <h4> <?php echo($module->title);?></h4>
					    <p> <?php echo($module->description);?></p>
					   
					</div>
				  </li>
				  @endif
			  @endforeach
                </ul>
            </div>
		@endforeach
        </div>
@stop

@section('footer')
	@include('parts.footer')
@stop


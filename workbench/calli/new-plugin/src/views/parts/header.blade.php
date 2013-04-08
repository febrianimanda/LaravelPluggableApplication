<!-- Header -->
<div class="container">
    <div class="header row">
        <div class="span12">
            <div class="navbar">
                <div class="navbar-inner">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <h1>
                        <a class="brand" href="./">Application Modulaire</a>
                    </h1>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="current-page">
                                <a href="./userhome"><i class="icon-home"></i><br />Home</a>
                            </li>
                            <li>
                                <a href="./modules"><i class="icon-tasks"></i><br />Modules</a>
                            </li>
                            <li>
                                <a href="./profile"><i class="icon-user"></i><br />Profile</a>
                            </li>
				     @if (isset($pluginList))
				     @foreach ($pluginList as $plugin)
					<li>
                                <?php echo('<a href="'.$plugin["mainMenuEntry"]["label"].'"><i class="icon-user"></i><br />'.$plugin["mainMenuEntry"]["label"].'</a>'); ?>
                            </li>
					@endforeach
					@endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
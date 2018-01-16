<header id="header">
	<div id="logo-group">
		
		<!-- PLACE YOUR LOGO HERE -->
		<span id="logo"  style="margin-top: 4px!important; ">
			<a href="/">
				<img src="/img/levalet.png" alt="logo" style="width:140px; "/>
			</a>
		</span>
		<!-- END LOGO PLACEHOLDER -->
		
		<!-- Note: The activity badge color changes when clicked and resets the number to 0
			Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
			
			<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
			
			<!-- END AJAX-DROPDOWN -->
		</div>
		
		<!-- #PROJECTS: projects dropdown -->
		
		<!-- end projects dropdown -->
		
		<!-- #TOGGLE LAYOUT BUTTONS -->
		<!-- pulled right: nav area -->
		<div class="pull-right">
			
			<!-- collapse menu button -->
			<div id="hide-menu" class="btn-header pull-right">
				<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
			</div>
			<!-- end collapse menu -->
			
			<!-- #MOBILE -->
			<!-- Top menu profile link : this shows only when top menu is active -->
			<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
				<li class="">
					<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
						<img src="img/avatars/sunny.png" alt="John Doe" class="online" />  
					</a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#ajax/profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
						</li>
					</ul>
				</li>
			</ul>
			
			
			<!-- logout button -->
			<div id="logouta" class="btn-header transparent pull-right">
				<span> <a  href="{{ route('logout') }}" title="Sign Out" data-action="userLogout" data-logout-msg="{{ trans('lang.confirm_logout') }}"><i class="fa fa-sign-out"></i></a> </span>
			</div>
			<!-- end logout button -->
			
			<!-- fullscreen button -->
			<div id="fullscreen" class="btn-header transparent pull-right">
				<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
			</div>
			<!-- end fullscreen button -->
			@if(Auth::user())
			<!-- User info -->
			<div  class="btn-header  pull-right">
				<div class="login-info">
					<span> <!-- User image size is adjusted inside CSS, it should stay as is -->
						
						<a href="javascript:;" id="show-shortcut" data-action="toggleShortcut" >
							<img src="img/avatars/sunny.png" alt="me" class="online" />
							<span>
								{{ Auth::user()->first_name }}
							</span>
							<i class="fa fa-angle-down"></i>
						</a>
						
					</span>
				</div>
				@endif
			</div>
		</div>
		<!-- end pulled right: nav area -->
		
	</header>
	<style>
		.block	ul  {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		
		.block	li  a {
			display: block;
			width: 200px;
			color: rgb(255, 253, 253);
			padding: 12px 12px 12px 12px;
			margin: 0px;
			
		}
		.block  li a:hover {
			color: rgb(82, 118, 218);
		}
		
	</style>
	
	<div id="shortcut" style="  top:49px;  ">
		<div class="  text-left" style=" float:right; width:200px;">
			<h5 style="padding-left:20px">{{ trans('lang.Profile') }}</h5>
			<ul class="block">
				<li >
					<a href="javascript:void(0);">{{ trans('lang.User Profile') }}</a>
				</li>
			</ul>
		</div>
		<div class=" text-left" style=" float:right; width:200px;" >
			<h5 style="padding-left:20px">{{ trans('lang.parameters') }}</h5>
			
			
			<ul class="block">
				<li >
					<a href="{{route('colorgroup.index')}}">{{ trans('lang.groupe_couleur') }}</a>
				</li>
				<li  >
					<a href="javascript:void(0);">Button toolbar</a>
				</li>
				<li  >
					<a href="javascript:void(0);">Sizing</a>
				</li>
				<li  >
					<a href="javascript:void(0);">Nesting</a>
				</li>
				<li  >
					<a href="javascript:void(0);">Vertical variation</a>
				</li>
			</ul>
		</div>
	</div>
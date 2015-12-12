 <!-- menu nav -->    
<nav class = "navbar navbar-default navbar-fixed-top">
 	<div class="container">
 		<!-- Brand and toggle get grouped for better mobile display -->
 		<div class="navbar-header">
 			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
 				<span class="sr-only">Toggle navigation</span>
 				<span class="icon-bar"></span>
 				<span class="icon-bar"></span>
 				<span class="icon-bar"></span>
 			</button>
 			<a class="navbar-brand" href="{{URL::route('home')}}">{{$app_name}}</a>
 		</div>

 		<!-- Collect the nav links, forms, and other content for toggling -->
 		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 		
 			
 			<ul class="nav navbar-nav navbar-right">
 			@if (Auth::guest())
 			 <li><a href="{{URL::route('login')}}">{{ Lang::get('navbar.login_btn')}}</a></li>
 		      <li><a class= "navbar-btn btn btn-primary" href="{{URL::route('signup')}}">{{ Lang::get('navbar.signup_btn')}}</a></li>
 		      @else

 		      <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{Auth::user()->name}} <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Perfil</a></li>
			            <li><a href="{{URL::route('logout')}}">{{ Lang::get('navbar.logout_btn')}}</a></li>
			            
          			  </ul>
       		   </li>
 		    @endif 
 				
 			</ul>
 		</div><!-- /.navbar-collapse -->
 	</div><!-- /.container-fluid -->
 </nav>
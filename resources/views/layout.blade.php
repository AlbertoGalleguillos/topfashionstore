<!doctype html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Inbox | Propeller - Admin Dashboard">
<meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
<title>Top Fashion Store</title>
<link rel="shortcut icon" type="image/x-icon" href="themes/images/favicon.ico">

<!-- Google icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Materializecss -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

<!-- Bootstrap css -->
<!-- build:[href] assets/css/ -->
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<!-- /build -->

<!-- Propeller css -->
<!-- build:[href] assets/css/ -->
<link rel="stylesheet" type="text/css" href="/css/propeller.min.css">
<!-- /build -->

<!-- Propeller theme css-->
<link rel="stylesheet" type="text/css" href="/css/propeller-theme.css" />

<!-- Propeller admin theme css-->
<link rel="stylesheet" type="text/css" href="/css/propeller-admin.css">
<!-- Styles Ends -->

<meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
<!-- Header Starts -->
<!--Start Nav bar -->
<nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth">

	<div class="container-fluid">
		<div class="pmd-navbar-right-icon pull-right navigation">

			<!-- Notifications -->
            <div class="dropdown notification icons pmd-dropdown">
			
				<a href="javascript:void(0)" title="Notification" class="dropdown-toggle pmd-ripple-effect"  data-toggle="dropdown" role="button" aria-expanded="true">
					<div data-badge="3" class="material-icons md-light pmd-sm pmd-badge  pmd-badge-overlap">notifications_none</div>
				</a>
			
				<div class="dropdown-menu dropdown-menu-right pmd-card pmd-card-default pmd-z-depth" role="menu">
					<!-- Card header -->
					<div class="pmd-card-title">
						<div class="media-body media-middle">
							<a href="notifications.html" class="pull-right">3 new notifications</a>
							<h3 class="pmd-card-title-text">Notifications</h3>
						</div>
					</div>
					
					<!-- Notifications list -->
					<ul class="list-group pmd-list-avatar pmd-card-list">
						<li class="list-group-item hidden">
							<p class="notification-blank">
								<span class="dic dic-notifications-none"></span> 
								<span>You don´t have any notifications</span>
							</p>
						</li>
						<li class="list-group-item unread">
							<a href="javascript:void(0)">
								<div class="media-left">
									<span class="avatar-list-img40x40">
										<img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-1.png" data-holder-rendered="true">
									</span>
								</div>
								<div class="media-body">
									<span class="list-group-item-heading"><span>Prathit</span> posted a new challanegs</span>
									<span class="list-group-item-text">5 Minutes ago</span>
								</div>
							</a>
						</li>
						<li class="list-group-item">
							<a href="javascript:void(0)">
								<div class="media-left">
									<span class="avatar-list-img40x40">
										<img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-2.png" data-holder-rendered="true">
									</span>
								</div>
								<div class="media-body">
									<span class="list-group-item-heading"><span>Keel</span> Cloned 2 challenges.</span>
									<span class="list-group-item-text">15 Minutes ago</span>
								</div>
							</a>
						</li>
						<li class="list-group-item unread">
							<a href="javascript:void(0)">
								<div class="media-left">
									<span class="avatar-list-img40x40">
										<img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-3.png" data-holder-rendered="true">
									</span>
								</div>
							
								<div class="media-body">
									<span class="list-group-item-heading"><span>John</span> posted new collection.</span>
									<span class="list-group-item-text">25 Minutes ago</span>
								</div>
							</a>
						</li>
						<div id="content" class="pmd-content inner-page"><li class="list-group-item unread">
							<a href="javascript:void(0)">
								<div class="media-left">
									<span class="avatar-list-img40x40">
										<img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-4.png" data-holder-rendered="true">
									</span>
								</div>
								<div class="media-body">
									<span class="list-group-item-heading"><span>Valerii</span> Shared 5 collection.</span>
									<span class="list-group-item-text">30 Minutes ago</span>
								</div>
							</a>
						</li>
					</ul><!-- End notifications list -->

				</div>
            </div> <!-- End notifications -->
		</div>
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a href="javascript:void(0);" class="btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i class="material-icons">menu</i></a>	
		  <a href="index.html" class="navbar-brand">Top Fashion Store</a>
		</div>
	</div>

</nav><!--End Nav bar -->
<!-- Header Ends -->

<!-- Sidebar Starts -->
<div class="pmd-sidebar-overlay"></div>

<!-- Left sidebar -->
<aside class="pmd-sidebar sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
	<ul class="nav pmd-sidebar-nav">
		
		<!-- User info -->
		<li class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg">
			<a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" aria-expandedhref="javascript:void(0);">
				<div class="media-left">
					<img src="/images/user-icon.png" alt="New User">
				</div>
				<div class="media-body media-middle">
					@if (Auth()->check())
						{{ Auth()->user()->name }}
					@else 
						Propeller Admin
					@endif	
				</div>
				<div class="media-right media-middle"><i class="dic-more-vert dic"></i></div>
			</a>
			<ul class="dropdown-menu">
				<li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						Cerrar Sesión
                    </a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</li><!-- End user info -->
        <li> 
            <a class="pmd-ripple-effect" href="/dashboard">	
                <i class="media-left media-middle">
					<svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18" xml:space="preserve">
						<g>
        					<path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
    					</g>
					</svg>
				</i>
                <span class="media-body">Dashboard</span>
            </a> 
        </li>
		<li> 
            <a class="pmd-ripple-effect" href="/messages">
                <i class="media-left media-middle">
					<svg version="1.1" x="0px" y="0px" width="18px" height="12.479px" viewBox="288.64 363.118 18 12.479" enable-background="new 288.64 363.118 18 12.479" xml:space="preserve">
						<g transform="translate(641.29613,1096.2351)">
							<path fill="#C9C8C8" d="M-352.656-726.466v-5.828l4.484,4.484c2.467,2.466,4.499,4.484,4.516,4.484s2.049-2.018,4.516-4.484 l4.484-4.484v5.828v5.828h-9h-9V-726.466z M-347.854-728.929l-4.188-4.188h8.385h8.386l-4.188,4.188 c-2.304,2.303-4.192,4.188-4.198,4.188S-345.551-726.626-347.854-728.929z"/>
						</g>
					</svg>				
				</i>
                <span class="media-body">Mensajes</span>
            </a> 
        </li>
		{{--
		<li class="dropdown pmd-dropdown"> 
			<a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">	
				<i class="media-left media-middle">
					<svg version="1.1" x="0px" y="0px" width="18px" height="12.479px" viewBox="288.64 363.118 18 12.479" enable-background="new 288.64 363.118 18 12.479" xml:space="preserve">
						<g transform="translate(641.29613,1096.2351)">
							<path fill="#C9C8C8" d="M-352.656-726.466v-5.828l4.484,4.484c2.467,2.466,4.499,4.484,4.516,4.484s2.049-2.018,4.516-4.484 l4.484-4.484v5.828v5.828h-9h-9V-726.466z M-347.854-728.929l-4.188-4.188h8.385h8.386l-4.188,4.188 c-2.304,2.303-4.192,4.188-4.198,4.188S-345.551-726.626-347.854-728.929z"/>
						</g>
					</svg>
				</i> 
				<span class="media-body">Mensajes</span>
				<div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
			</a>
			<ul class="dropdown-menu">
				<li><a href="/messages/inbox">Recibidos</a></li>
				<li><a href="/messages/sent">Enviados</a></li>
				<li><a href="/messages/trash">Papelera</a></li>
			</ul>
		</li>
		--}}
		<li> 
			<a class="pmd-ripple-effect" href="/notifications">	
				<i class="media-left media-middle">
				<svg version="1.1" id="Layer_1" x="0px" y="0px" width="15.3px" height="18px" viewBox="289.99 337.535 15.3 18" enable-background="new 289.99 337.535 15.3 18" xml:space="preserve">
					<g>
						<g>
							<path fill="#C9C8C8" d="M297.64,355.535c0.99,0,1.8-0.81,1.8-1.8h-3.6C295.84,354.725,296.65,355.535,297.64,355.535z
								 M303.49,350.135v-4.95c0-2.79-1.891-5.041-4.501-5.67v-0.63c0-0.72-0.63-1.35-1.35-1.35c-0.72,0-1.35,0.63-1.35,1.35v0.63
								c-2.61,0.629-4.5,2.88-4.5,5.67v4.95l-1.8,1.8v0.9h15.3v-0.9L303.49,350.135z"/>
						</g>
					</g>
				</svg></i> 
				<span class="media-body">Notifications</span>
			</a> 
		</li>
		
	</ul>
</aside><!-- End Left sidebar -->
<!-- Sidebar Ends -->

<div id="content" class="pmd-content inner-page">
	@yield('content')
</div>

<!-- Footer Starts -->
<footer class="admin-footer">
 <div class="container-fluid">
 	<ul class="list-unstyled list-inline">
	 	<li>
			<span class="pmd-card-subtitle-text align-text-bottom">Top Fashion Store &copy; <span class="auto-update-year"></span>.</span>
        </li>
        <li class="pull-right for-support">
			<a href="mailto:agalleguillos.tfs@gmail.com">
          		<div>
					<svg x="0px" y="0px" width="38px" height="38px" viewBox="0 0 38 38" enable-background="new 0 0 38 38">
<g><path fill="#A5A4A4" d="M25.621,21.085c-0.642-0.682-1.483-0.682-2.165,0c-0.521,0.521-1.003,1.002-1.524,1.523
		c-0.16,0.16-0.24,0.16-0.44,0.08c-0.321-0.2-0.683-0.32-1.003-0.521c-1.483-0.922-2.726-2.125-3.809-3.488
		c-0.521-0.681-1.002-1.402-1.363-2.205c-0.04-0.16-0.04-0.24,0.08-0.4c0.521-0.481,1.002-1.003,1.524-1.483
		c0.721-0.722,0.721-1.524,0-2.246c-0.441-0.44-0.842-0.842-1.203-1.202c-0.441-0.441-0.842-0.842-1.243-1.243
		c-0.642-0.642-1.483-0.642-2.165,0c-0.521,0.521-1.002,1.002-1.524,1.523c-0.481,0.481-0.722,1.043-0.802,1.685
		c-0.08,1.042,0.16,2.085,0.521,3.047c0.762,2.085,1.925,3.849,3.328,5.532c1.884,2.286,4.17,4.05,6.815,5.333
		c1.203,0.562,2.406,1.002,3.729,1.123c0.922,0.04,1.724-0.201,2.365-0.923c0.441-0.521,0.923-0.922,1.403-1.403
		c0.682-0.722,0.682-1.563,0-2.245C27.265,22.729,26.423,21.927,25.621,21.085z"/>
	<path fill="#A5A4A4" d="M32.437,5.568C28.869,2,24.098-0.005,19.005-0.005S9.182,2,5.573,5.568C2.005,9.177,0,13.908,0,19
		s1.965,9.823,5.573,13.432c3.568,3.568,8.34,5.573,13.432,5.573s9.823-1.965,13.431-5.573
		C39.854,25.014,39.854,12.985,32.437,5.568z M30.299,30.294c-3.003,3.045-7.021,4.695-11.293,4.695
		c-4.272,0-8.291-1.65-11.294-4.695C4.666,27.29,3.016,23.271,3.016,19c0-4.272,1.649-8.291,4.695-11.294
		c3.003-3.003,7.022-4.695,11.294-4.695c4.272,0,8.291,1.649,11.293,4.695C36.56,13.924,36.56,24.075,30.299,30.294z"/>
</g></svg>
            	</div>
            	<div>
				  <span class="pmd-card-subtitle-text">Para Soporte</span>
				  <h3 class="pmd-card-title-text">agalleguillos.tfs@gmail.com</h3>
				</div>
            </a>
        </li>
    </ul>
 </div>
</footer>
<!-- Footer Ends -->


<!-- Scripts Starts -->  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<!-- build:[src] assets/js/ -->
<script src="/js/jquery-1.12.2.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/propeller.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<script src="{{ asset('js/app.js') }}"></script>

<!-- /build -->
<script>
	$(document).ready(function() {
		var sPath=window.location.pathname;
		var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
		$(".pmd-sidebar-nav").each(function(){
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").addClass("open");
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
			$(this).find("a[href='"+sPage+"']").addClass("active");
		});
		$(".auto-update-year").html(new Date().getFullYear());
	});
</script> 

<!-- Scripts Ends -->
</body>
</html>
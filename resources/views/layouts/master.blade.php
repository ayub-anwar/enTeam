<!DOCTYPE html>
<html lang="en">
	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<!--<meta name="description" content="SoengSouy Admin Template">-->
	<meta name="keywords" content="admin,employee, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<!--<meta name="author" content="SoengSouy Admin Template">-->
	<meta name="robots" content="noindex, nofollow">
	<title>Dashboard - HRMS</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('assets/img/favicon.png') }}">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css') }}">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{ URL::to('assets/css/font-awesome.min.css') }}">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="{{ URL::to('assets/css/line-awesome.min.css') }}">
	<!-- Datatable CSS -->
	<link rel="stylesheet" href="{{ URL::to('assets/css/dataTables.bootstrap4.min.css') }}">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{ URL::to('assets/css/select2.min.css') }}">
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}">
	<!-- Chart CSS -->
	<link rel="stylesheet" href="{{ URL::to('assets/plugins/morris/morris.css') }}">
	<!-- Main CSS -->
	<link rel="stylesheet" href="{{ URL::to('assets/css/style.css') }}">

	{{-- message toastr --}}
	<link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
	<script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
</head>

<body>
	<style>
		.invalid-feedback {
			font-size: 14px;
		}
	</style>
	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Loader -->
		<div id="loader-wrapper">
			<div id="loader">
				<div class="loader-ellips">
					<span class="loader-ellips__dot"></span>
					<span class="loader-ellips__dot"></span>
					<span class="loader-ellips__dot"></span>
					<span class="loader-ellips__dot"></span>
				</div>
			</div>
		</div>
		<!-- /Loader -->

		<!-- Header -->
		<div class="header">
			<!-- Logo -->
			<div class="header-left">
				<a href="{{ route('home') }}" class="logo">
					<?php
					use App\Models\Notification;
					$getuserPhoto = Auth::user()->avatar;
					$getuserid = Auth::user()->user_id;
					?>
					<img src="{{ asset('images/' . $getuserPhoto) }}" width="40" height="40" alt="">
					<input type="text" hidden id="gettingid" value="{{$getuserid}}">
				</a>
			</div>
			<!-- /Logo -->
			<a id="toggle_btn" href="javascript:void(0);">
				<span class="bar-icon">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>
			<!-- Header Title -->
			<div class="page-title-box">
				<h3>Hi, {{ Session::get('name') }}</h3>
			</div>
			<!-- /Header Title -->
			<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
			<!-- Header Menu -->
			<ul class="nav user-menu">
				<!-- Search -->
				<li class="nav-item">
					<div class="top-nav-search">
						<a href="javascript:void(0);" class="responsive-search"> <i class="fa fa-search"></i> </a>
						<form action="search.html">
							<input class="form-control" type="text" placeholder="Search here">
							<button class="btn" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</form>
					</div>
				</li>
				<!-- /Search -->

				<!-- Flag -->
				<li class="nav-item dropdown flag-nav">
					<a class="nav-link dropdown-toggle">
						<img src="{{ URL::to('assets/img/flags/us.png') }}" alt="" height="20"> <span>English</span>
					</a>
				</li>
				<!-- /Flag -->

				<!-- Notifications -->
				<li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="fa fa-bell-o"></i>
						<span id="totalnotifications" class="badge badge-pill">3</span>
					</a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notifications</span>
							<a href="{{ route('clearmynotfications', $getuserid) }}" class="clear-noti"> Clear All </a>

						</div>
						<div class="noti-content">
							<ul class="notification-list">
								<!-- Notifications Li Start -->
								<script>
									$(document).ready(function() {
										var user_id = $('#gettingid').val();
										var url = "getNotified/" + user_id;
										$.ajax({
											url: 'getNotified/' + user_id,
											method: "GET",
											dataType: "json",

											success: function(data) {
												var dataContainer = $(".notification-list");
												$('#totalnotifications').text(data.length);
												// For demonstration purposes, let's assume the data is an array of objects
												for (var i = 0; i < data.length; i++) {
													var item = data[i];
													console.log(item.notification_message)
													var setHTML = `<li class="notification-message">									
										<div class="media">
											<div class="media-body mx-2">
												<span class="noti-title"></span><span class="noti-title"> ${item.notification_message}</span>
												<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
											</div>
										</div>
								</li>`;
													var itemHtml = "<p>" + item.notification_message + ": " + item.value + "</p>";
													dataContainer.append(setHTML);
												}
											},
											error: function(jqXHR, textStatus, errorThrown) {
												console.error("AJAX Error: " + textStatus, errorThrown);
											}
										});
									});
								</script>
								<!-- Notifications Li END -->
							</ul>
						</div>
						<div class="topnav-dropdown-footer"> <a href="activities.html">View all Notifications</a> </div>
					</div>
				</li>
				<!-- /Notifications -->

				<li class="nav-item dropdown has-arrow main-drop">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img">
							<img src="{{ asset('images/' . $getuserPhoto) }}">
							<span class="status online"></span></span>
						<span>{{ Session::get('name') }}</span>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ route('profile_user') }}">My Profile</a>
						<a class="dropdown-item" href="{{ route('company/settings/page') }}">Settings</a>
						<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
					</div>
				</li>
			</ul>
			<!-- /Header Menu -->

			<!-- Mobile Menu -->
			<div class="dropdown mobile-user-menu">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-ellipsis-v"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="{{ route('profile_user') }}">My Profile</a>
					<a class="dropdown-item" href="{{ route('company/settings/page') }}">Settings</a>
					<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
				</div>
			</div>
			<!-- /Mobile Menu -->

		</div>
		<!-- /Header -->
		<!-- Sidebar -->
		@include('sidebar.sidebar')
		<!-- /Sidebar -->
		<!-- Page Wrapper -->
		@yield('content')
		<!-- /Page Wrapper -->
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="{{ URL::to('assets/js/jquery-3.5.1.min.js') }}"></script>
	<!-- Bootstrap Core JS -->
	<script src="{{ URL::to('assets/js/popper.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/bootstrap.min.js') }}"></script>
	<!-- Chart JS -->
	<script src="{{ URL::to('assets/plugins/morris/morris.min.js') }}"></script>
	<script src="{{ URL::to('assets/plugins/raphael/raphael.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/chart.js') }}"></script>
	<script src="{{ URL::to('assets/js/Chart.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/line-chart.js') }}"></script>
	<!-- Slimscroll JS -->
	<script src="{{ URL::to('assets/js/jquery.slimscroll.min.js') }}"></script>
	<!-- Select2 JS -->
	<script src="{{ URL::to('assets/js/select2.min.js') }}"></script>
	<!-- Datetimepicker JS -->
	<script src="{{ URL::to('assets/js/moment.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
	<!-- Datatable JS -->
	<script src="{{ URL::to('assets/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/dataTables.bootstrap4.min.js') }}"></script>
	<!-- Multiselect JS -->
	<script src="{{ URL::to('assets/js/multiselect.min.js') }}"></script>
	<!-- Custom JS -->
	<script src="{{ URL::to('assets/js/app.js') }}"></script>
	@yield('script')

</body>

</html>
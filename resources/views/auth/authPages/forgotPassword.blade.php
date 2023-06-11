<!DOCTYPE html>
<html lang="en">
	<head><base href="../../../">
		<title>Shipment Tracking System</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/logo-1645494239.jpg') }}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{ ('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ ('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Password reset -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #F2C98A">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<!--begin::Content-->
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
							<!--begin::Logo-->
							<a href="../../demo9/dist/index.html" class="py-9 mb-5">
								<img alt="Logo" src="{{ asset('assets/media/logos/logo-1645494239.jpg') }}" class="h-60px" />
							</a>
							<!--end::Logo-->
							<h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">Welcome to Shipment Tracking System</h1>
							<p class="fw-bold fs-2" style="color: #986923;">The shipment follow-up system is a system through which it is possible to follow up the transport shipments that were sent via the code that will be delivered to the person sent by the company, and the person can follow the status of the shipment via this code through the tracking page on the site
							</p>
						</div>
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(assets/media/illustrations/sigma-1/13.png"></div>
					</div>
				</div>
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<div class="w-lg-500px p-10 p-lg-15 mx-auto">
							<form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" method="POST" action="{{ route('password.email') }}">
								@csrf
								<div class="text-center mb-10">
									<h1 class="text-dark mb-3">Forgot Password ?</h1>
									<div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
								</div>
								@if(session('status'))
                                 <div id="alert" class="alert alert-success">{{ session('status') }}</div>
                                @endif
								<div class="fv-row mb-10">
									<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
									<input class="form-control form-control-solid @error('email') is-invalid @enderror" type="email" placeholder="" name="email" autocomplete="off" />
									@error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
								</div>
								<div class="d-flex flex-wrap justify-content-center pb-lg-0">
									<button type="submit" {{-- id="kt_password_reset_submit" --}} class="btn btn-lg btn-primary fw-bolder me-4">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
									<a href="" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
								</div>
							</form>
						</div>
					</div>
					<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
						<div class="d-flex flex-center fw-bold fs-6">
							<a href="https://keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">About</a>
							<a href="https://devs.keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">Support</a>
							<a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>var hostUrl = "assets/";</script>
		<script src="{{ ('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ ('assets/js/scripts.bundle.js') }}"></script>
		<script src="{{ ('assets/js/custom/authentication/password-reset/password-reset.js') }}"></script>
	    <script>
			$("#alert").show().delay(5000).fadeOut();
		</script>
	</body>
</html>
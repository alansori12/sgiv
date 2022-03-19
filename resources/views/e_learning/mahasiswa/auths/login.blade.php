<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/all.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('assets/js/app.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Page content -->
	<div class="page-content login-cover">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">

					<!-- Login form -->
					<form class="login-form wmin-sm-400" action="{{ route('mahasiswa.postlogin') }}" method="POST">
						<div class="card mb-0">
							<div class="tab-content card-body">
                                <div class="text-center mb-3">
                                    <i class="icon-reading icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">Login to your account</h5>
                                    <span class="d-block text-muted">Your credentials</span>
                                </div>

								@if(Session::has('error'))
								<div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible">
									<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
									<span class="font-weight-semibold">Login Gagal!</span> {{Session::get('error')}}
								</div>
								@endif

								@csrf

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" name="email" autocomplete="off" class="form-control" placeholder="Email" value="{{old('email')}}">
                                    <div class="form-control-feedback">
                                        <i class="icon-envelop3 text-muted"></i>
                                    </div>
									@error('email')
										<label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
									@enderror
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" name="password" autocomplete="off" class="form-control" placeholder="Password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
									@error('password')
										<label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
									@enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-enter2 ml-2"></i></button>
                                </div>

                                <hr>

                                <span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
							</div>
						</div>
					</form>
					<!-- /login form -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>

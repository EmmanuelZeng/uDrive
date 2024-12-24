<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Connectez-vous à uDrive</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" method="POST" action="{{route('store')}}">
                            @csrf
                            @method('POST')
                            @if(Session::get('error_msg'))
                                <b>{{Session::get('error_msg')}}</b>
                            @endif

							{{-- {{Hash::make(12345)}}; --}}
                            <div class="name mb-3">
								<label class="sr-only" for="signin-name">Nom</label>
								<input id="signin-name" name="name" type="text" class="form-control signin-name" placeholder="Nom" required="required">
							</div><!--//form-group-->
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="signin-email" name="email" type="email" class="form-control signin-email" placeholder="Email address" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Mot de passe</label>
								<input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
							</div><!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-role">Role</label>
                                <select name="role_id" id="signin-role">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}"> {{$role->name}} </option>
                                    @endforeach
                                </select>
							</div>
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Créer</button>
							</div>
						</form>
					</div><!--//auth-form-container-->

			    </div><!--//auth-body-->
		    </div><!--//flex-column-->
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Prêt à vous lancer?</h5>
					    <div>uDrive est une plateforme de partage et stockage de Fichiers entre les membres du département de Mathématique et Informatique</div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->

    </div><!--//row-->


</body>
</html>


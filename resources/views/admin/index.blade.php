<!DOCTYPE html>
<html lang="en">
<head>
    <title>uDrive-Math-Info</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="../favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

</head>

<style>
	.file-card-actions{
		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
		position: absolute;
		top: 1rem;
		right: 0.75rem;
		z-index: 10;
		font-size: 0.8125rem;
	}
	.file-card-actions:hover{
		cursor: pointer;
	}
</style>
<body class="app">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
	        <div class="container-fluid py-2">
		        <div class="app-header-content">
		            <div class="row justify-content-between align-items-center">

				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="search-mobile-trigger d-sm-none col">
			            <i class="search-mobile-trigger-icon fas fa-search"></i>
			        </div><!--//col-->
		            <div class="app-search-box col">
		                <form class="app-search-form">
							<input type="text" placeholder="Recherche..." name="search" class="form-control search-input">
							<button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button>
				        </form>
		            </div><!--//app-search-box-->

		            <div class="app-utilities col-auto">
			            <div class="app-utility-item app-user-dropdown dropdown">
				            <img src="../assets/images/user.png" alt="user profile">
			            </div><!--//app-user-dropdown-->
		            </div><!--//app-utilities-->
		        </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel">
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="../admin/index.html"><img class="logo-icon me-2" src="../assets/images/app-logo.svg" alt="logo"><span class="logo-text">uDrive</span></a>

		        </div><!--//app-branding-->

			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link active" href="index.html">
						        <span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
										<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
									</svg>
						        </span>
		                        <span class="nav-link-text">Dashboard</span>
					        </a><!--//nav-link-->
				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->
				<div class="app-sidepanel-footer">
					<div class="app-nav app-nav-footer">
						<ul class="app-menu footer-menu list-unstyled">
							<li class="nav-item">
								<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
								<a class="nav-link" href="help.html">
									<span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-question-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
	  <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
	</svg>
									 </span>
									 <span class="nav-link-text">Aide</span>
								</a><!--//nav-link-->
							</li><!--//nav-item-->
							<form action="{{route('logout')}}" method="POST">
                                @csrf
                                <li class="nav-item">
                                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <a class="nav-link" href="{{route('login')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <span class="nav-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
                                         </span>
                                         <span class="nav-link-text">Déconnexion</span>
                                    </a><!--//nav-link-->
                                </li><!--//nav-item-->
                            </form>
						</ul>
					</div>
				</div>
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <h1 class="app-page-title">Espace Administration</h1>
			    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				    <div class="inner">
					    <div class="app-card-body p-3 p-lg-4">
						    <h3 class="mb-3">Bienvenue, Administrateur!</h3>
						    <div class="row gx-5 gy-3">
						        <div class="col-12 col-lg-9">
							        <div>Heureux de vous revoir sur la plateforme. Commencer par ajouter un utilisateur sur la plateforme</div>
							    </div><!--//col-->
							    <div class="col-12 col-lg-3">
								    <div data-bs-toggle="modal" data-bs-target="#createUserModal">
                                        <a class="btn app-btn-primary" href="#">
                                            <i class="fa-solid fa-plus"></i>
                                            Utilisateur
                                        </a>
                                    </div>
							    </div><!--//col-->
						    </div><!--//row-->
						    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
					    </div><!--//app-card-body-->

				    </div><!--//inner-->
			    </div><!--//app-card-->
				<div class="row g-3 my-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Les utilisateurs</h1>
				    </div>
			    </div><!--//row-->
			    <div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">N°</th>
												<th class="cell">Nom Complet</th>
												<th class="cell">Email</th>
												<th class="cell">Rôle</th>
												<th class="cell"></th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="cell"><span class="">01</span></td>
												<td class="cell"><span class="truncate">Emmanuel ZENG</span></td>
												<td class="cell">elson.test@gmail.com</td>
												<td class="cell"><span>Chef du Département</span></td>
												<td class="cell">
													<i class="fa-solid fa-trash"></i>
												</td>
												<td class="cell">
                                                    <i class="fa-solid fa-edit"></i>
												</td>
											</tr>
                                            <tr>
												<td class="cell"><span class="">02</span></td>
												<td class="cell"><span class="truncate">Ephraim ZOLA</span></td>
												<td class="cell">ephraim.test@gmail.com</td>
												<td class="cell"><span>Secrétaire Chargé de l'enseignement</span></td>
												<td class="cell">
													<i class="fa-solid fa-trash"></i>
												</td>
												<td class="cell">
                                                    <i class="fa-solid fa-edit"></i>
												</td>
											</tr>
                                            <tr>
												<td class="cell"><span class="">03</span></td>
												<td class="cell"><span class="truncate">Elione NGWADI</span></td>
												<td class="cell">elione.test@gmail.com</td>
												<td class="cell"><span>Secrétaire Chargé de la Recherche</span></td>
												<td class="cell">
													<i class="fa-solid fa-trash"></i>
												</td>
												<td class="cell">
                                                    <i class="fa-solid fa-edit"></i>
												</td>
											</tr>
                                            <tr>
												<td class="cell"><span class="">04</span></td>
												<td class="cell"><span class="truncate">Gadiel MAKUIKA</span></td>
												<td class="cell">gadiel.test@gmail.com</td>
												<td class="cell"><span>Secrétaire du Département</span></td>
												<td class="cell">
													<i class="fa-solid fa-trash"></i>
												</td>
												<td class="cell">
                                                    <i class="fa-solid fa-edit"></i>
												</td>
											</tr>
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
				</div><!--//tab-content-->
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
    </div><!--//app-wrapper-->

    <!-- Boite modal pour Créer un utilisateur -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createUserModalLabel">Ajouter un utilisateur</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="auth-form login-form mt-3">
                    <div class="name mb-3">
                        <label class="sr-only" for="name">Nom</label>
                        <input id="name" name="name" type="text" class="form-control name" placeholder="Nom utilisateur" required="required">
                    </div><!--//form-group-->
                    <div class="firstName mb-3">
                        <label class="sr-only" for="firstName">Prenom</label>
                        <input id="firstName" name="firstName" type="text" class="form-control firstName" placeholder="Prénom utilisateur" required="required">
                    </div><!--//form-group-->
                    <div class="email mb-3">
                        <label class="sr-only" for="email">Email</label>
                        <input id="email" name="email" type="email" class="form-control email" placeholder="Email Utilisateur" required="required">
                    </div><!--//form-group-->
                    <div class="role mb-3">
                        <label class="sr-only" for="role">Rôle</label>
                        <select name="role" id="role" class="form-control role" placeholder="Rôle Utilisateur" required="required">
                            <option value="" disabled selected>Rôle Utilisateur</option>
                            <option value="">Chef du Département</option>
                            <option value="">Secrétaire Chargé de l'enseignement</option>
                            <option value="">Secrétaire Chargé de la Recherche</option>
                            <option value="">Secrétaire du Département</p></option>
                        </select>
                    </div><!--//form-group-->
                    <div class="password mb-3">
                        <label class="sr-only" for="signin-password">Mot de passe</label>
                        <input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Mot de Passe" required="required">
                    </div><!--//form-group-->
                    <div class="text-center">
                        <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/index-charts.js') }}"></script>

    <script>
        let myModal = document.getElementById('myModal')
        let myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })
    </script>
    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>
</html>


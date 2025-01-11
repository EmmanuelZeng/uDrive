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
    <link rel="shortcut icon" href="favicon.ico">

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
        @include('components.navbar')
        @include('components.sidebar')
    </header><!--//app-header-->

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    @yield('content')
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
    </div><!--//app-wrapper-->
    {{-- Modal qui permet d'importer un fichier --}}
    <div class="modal fade" id="fileImportModal" tabindex="-1" aria-labelledby="fileImportModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="fileImportModal">Importation de fichier</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('files.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="folder_id" class="form-label">Sélectionner un dossier (optionnel) </label>
                    <select name="folder_id" id="folder_id" class="form-control mb-4">
                        <option value="">Selectionner un dossier</option>
                        @foreach ($folders as $folder)
                        <option value="{{$folder->id}}"> {{$folder->path}} </option>
                        @endforeach
                    </select>
                    <input
                        type="file"
                        id="inputLibelle"
                        class="form-control mb-4"
                        name="files[]" multiple
                    >
                    <div class="modal-footer">
                        <button
                          type="button"
                          class="btn btn-outline-secondary"
                          data-bs-dismiss="modal"
                        >
                          Annuler
                        </button>
                        <button type="submit" class="btn btn-primary" id="addLibelle">
                          Importer
                        </button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    {{-- Modal qui permet de créer un dossier --}}
    <div class="modal fade" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="createFolderModalLabel">Créer un dossier</h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('folders.store')}}" method="POST">
                    @csrf
                    <label for="folder_id" class="form-label">Sélectionner un dossier (optionnel) </label>
                    <select name="parent_id" id="folder_id" class="form-control mb-4">
                        <option value="">No parent folder</option>
                        @foreach($folders as $folder)
                        <option value="{{ $folder->id }}" {{ old('parent_id') == $folder->id ? 'selected' : '' }}>
                            {{ $folder->path }}
                        </option>
                        @endforeach
                    </select>
                    <input
                        type="text"
                        id="inputLibelle"
                        class="form-control mb-4"
                        name="name" multiple
                        value="{{ old('name') }}"
                        placeholder="Nom du dossier"
                    >
                    <div class="modal-footer">
                        <button
                        type="button"
                        class="btn btn-outline-secondary"
                        data-bs-dismiss="modal"
                        >
                        Annuler
                        </button>
                        <button type="submit" class="btn btn-primary" id="addLibelle">
                        Créer
                        </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- Javascript -->

    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/index-charts.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script>
        function openBoite() {
          document.getElementById("file_import").classList.remove("d-none");
          document.getElementById("inputLibelle").focus();
        }

        function closeBoite() {
          document.getElementById("file_import").classList.add("d-none");
        }
    </script>
</body>
</html>


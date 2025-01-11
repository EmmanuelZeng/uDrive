@extends('app')

@section('modal')
<div class="fade" style="display: flex">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="fileImportModalLabel">Créer un dossier</h5>
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
        ></button>
        </div>
        <div class="modal-body">
            <form action="{{route('folders.update', $folder)}}" method="POST">
                @csrf
                <label for="folder_id" class="form-label">Sélectionner un dossier (optionnel) </label>
                <select name="parent_id" id="folder_id" class="form-control mb-4" value="{{ old('name') }}">
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
@endsection

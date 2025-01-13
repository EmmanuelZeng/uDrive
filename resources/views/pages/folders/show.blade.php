@extends('app')

@section('content')
<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0"> {{$folder->name}} </h1>
    </div>
    <div class="col-auto">
        <div class="page-utilities">
           <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
               <div class="col-auto">
                   <button class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#createFolderModal">
                        <i class="fa-solid fa-plus"></i>
                       Créer un dossier
                   </button>
               </div>
           </div><!--//row-->
       </div><!--//table-utilities-->
   </div><!--//col-auto-->
</div><!--//row-->
<div class="row g-4">
    @forelse ($subfolders as $subfolder)
        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-thumb-holder p-3">
                    <span class="icon-holder">
                        <i class="fas fa-solid fa-folder text-file" style="color: #FFD700;"></i>
                    </span>
                    <a class="app-card-link-mask" href="{{ route('folders.show', $subfolder) }}"></a>
                </div>
                <div class="app-card-body p-3 has-card-actions">

                    <h4 class="app-doc-title truncate mb-0"><a href="{{route('folders.show', $subfolder)}}"> {{$subfolder->name}} </a></h4>
                    <div class="app-doc-meta">
                        <ul class="list-unstyled mb-0">
                            <li><span class="text-muted">Eléments :</span>{{ $subfolder->files_count + $subfolder->children_count }}</li>
                            <li><span class="text-muted">Crée le :</span>{{$subfolder->created_at->format('d M, Y')}}</li>
                        </ul>
                    </div><!--//app-doc-meta-->

                    <div class="app-card-actions">
                        <div class="dropdown">
                            <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                </svg>
                            </div><!--//dropdown-toggle-->
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('folders.edit', $subfolder) }}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>
                                        Editer
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{route('folders.destroy', $subfolder)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="dropdown-item" type="submit">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                            Supprimer
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div><!--//dropdown-->
                    </div><!--//app-card-actions-->

                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div><!--//col-->
    @empty
        <h2 class="text-center"></h2>
    @endforelse

    @forelse ($files as $file)
        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-thumb-holder p-3">
                    <span class="icon-holder">
                        @if(str_contains($file->mime_type, 'image'))
                            <i class="fas fa-file-image text-file"></i>
                        @elseif(str_contains($file->mime_type, 'pdf'))
                            <i class="fas fa-file-pdf pdf-file"></i>
                        @elseif(str_contains($file->mime_type, 'spreadsheet'))
                            <i class="fas fa-file-excel excel-file"></i>
                        @elseif(str_contains($file->mime_type, 'ppt'))
                            <i class="fas fa-file-powerpoint ppt-file"></i>
                        @elseif(str_contains($file->mime_type, 'zip'))
                            <i class="fas fa-file-archive zip-file"></i>
                        @else
                            <i class="fas fa-file-alt text-file"></i>
                        @endif
                    </span>
                </div>
                <div class="app-card-body p-3 has-card-actions">
                    <h4 class="app-doc-title truncate mb-0"> {{$file->name}} </h4>
                    <div class="app-doc-meta">
                        <ul class="list-unstyled mb-0">
                            <li>
                                @if (str_contains($file->mime_type, 'image'))
                                    <span class="text-muted">Type:</span> image
                                @elseif (str_contains($file->mime_type, 'pdf'))
                                    <span class="text-muted">Type:</span> pdf
                                @elseif (str_contains($file->mime_type, 'application'))
                                    <span class="text-muted">Type:</span> docx
                                @elseif (str_contains($file->mime_type, 'text'))
                                    <span class="text-muted">Type:</span> text
                                @elseif (str_contains($file->mime_type, 'Spreadsheet'))
                                    <span class="text-muted">Type:</span> xlx
                                @else
                                    <span class="text-muted">Type:</span> {{$file->mime_type}}
                                @endif
                            </li>
                            @php
                                $size = $file->size / 1048576
                            @endphp
                            <li><span class="text-muted">Taille:</span> {{number_format($size, 2)}} MB</li>
                            <li><span class="text-muted">Importé le :</span> {{$file->created_at->format('d M, Y')}}</li>
                        </ul>
                    </div><!--//app-doc-meta-->

                    <div class="app-card-actions">
                        <div class="dropdown">
                            <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                </svg>
                            </div><!--//dropdown-toggle-->
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{route('files.download', $file)}}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                        </svg>
                                        Télécharger
                                    </a>
                                </li>
                                <li>
                                    <div data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <a class="dropdown-item" href="#">
                                            <i class="fa-solid fa-share"></i>
                                            Partager
                                        </a>
                                    </div>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{route('files.destroy', $file)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="dropdown-item" type="submit">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                            Supprimer
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div><!--//dropdown-->
                    </div><!--//app-card-actions-->
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//col-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Partager "{{$file->name}}" à :</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <form action="{{ route('files.share.store', $file) }}" method="POST">
                                @csrf
                                <label>Sélectionner un utilisateur</label>
                                <div>
                                    @foreach($users as $user)
                                        <div class="d-flex flex-column gap-2">
                                            <div class="form-check">
                                                <input name="user_ids[]" class="form-check-input" type="checkbox" value="{{ $user->id }}" id="user_{{ $user->id }}">
                                                <label class="form-check-label" for="user_{{ $user->id }}">
                                                    {{ $user->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Partager</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    @empty

    @endforelse
</div>
@endsection

@extends('mise_en_forme.template')

@section('content')

{{--    //ici c'est la page qui me permet de modifier les employés--}}

    <h1 class="app-page-title">Employé</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Modifier un employé</h3>
            <div class="section-intro">Modifier ici, à travers ce formulaire un employé.</div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="POST"  action="{{ route('employer.modifierEnregistrement', $employer->id) }}" >
                        @csrf

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Département</label>
                            <select name="departement_id" id="departement_id" class="form-control">
                                <option value=" "></option>

                                {{--  //Je vais parcourire tout les départements par foreach afin de les récupérés--}}
                                {{--  //La condition après value permet de selectionné automatiquement le département--}}
                            @foreach($departements as $departement)
                                    <option value="{{ $departement->id }}" {{ $employer->departement_id == $departement->id ? 'selected' : '' }}>{{ $departement->name }}</option>
                                @endforeach

                            </select>

                            @error('departement_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Nom
                                <span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                          <circle cx="8" cy="4.5" r="1"/>
                                        </svg>
                                    </span>
                            </label>
                            <input type="text" class="form-control" id="setting-input-1" name="nom" value="{{ $employer->nom  }}" placeholder="Entrer le nom " required>

                            @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="setting-input-2" name="prenom" value=" {{ $employer->prenom  }} " placeholder="Entrer le prenom " required>

                            @error('prenom')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Email</label>
                            <input type="email" class="form-control" id="setting-input-3" name="email" value=" {{ $employer->email  }} " placeholder="Entrer un mail valide">

                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Contact</label>
                            <input type="text" class="form-control" id="setting-input-3" name="contact" value="{{ $employer->contact  }}" placeholder="Entrer un contact">

                            @error('contact')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Montant journalier</label>
                            <input type="number" class="form-control" id="setting-input-3" name="montant_journalier" value="{{ $employer->montant_journalier  }}" placeholder="Entrer un montant journalier">

                            @error('montant_journalier')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <button type="submit" class="btn app-btn-primary" >Mettre à jour</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div><!--//row-->



@endsection

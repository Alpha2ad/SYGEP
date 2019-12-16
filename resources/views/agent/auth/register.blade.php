    {{-- @extends('multiauth::layouts.appAuth')
    @section('content')

    <section class="">

       <form method="POST" action="{{ route('agent.register') }}">
    @csrf
    <div class="body">
        @include('multiauth::message')
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">person</i>
            </span>
            <div class="form-line">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nom" required autofocus>

                @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">email</i>
            </span>
            <div class="form-line">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Addresse E-Mail" required>

                @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  minlength="6" placeholder="Mot de Passe" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
                <input type="password" class="form-control" name="password_confirmation" minlength="6" placeholder="Confirmez le Mot de Passe" required>
            </div>
        </div>

    </div>
    <div class="row">
         <div class="col-xs-6">
            <button class="btn btn-block bg-blue waves-effect" type="submit">Enregistrer</button>
        </div>
    <div class="row m-t-15 m-b--20">

        <div class="col-xs-6 align-right">
            <a href="{{ route('agent.login') }}">J'ai un compte</a>
        </div>
    </div>
    </div>
</div>
</form>
</section>
@endsection --}}

@extends('multiauth::layouts.app')
@section('title', 'Ajout')

@push('css')

<link rel="stylesheet" href="{{ asset('backend/assets/plugins/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}"> --}}

@endpush
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header card-header">
            <h2></h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">


            <div class="row clearfix">
                <!-- Task Info -->
                <form method="POST" action="{{ route('agent.register') }}">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="card">
                            <div class="header bg-teal">
                                <span class="card-title">Ajout d'une nouvelle <strong>agent</strong></span>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li> <a href="{{route('agent.register')}}" class="bg-green text-white"><i class="material-icons">add</i>Nouveau {{ ucfirst(config('multiauth.prefix')) }}</a></li>
                                            <li> <a href="{{route('admin.agents.index')}}" class="bg-cyan text-white"><i class="material-icons">visibility</i>Liste des agents</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                @include('multiauth::message')
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nom" required autofocus>

                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <div class="form-line">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Addresse E-Mail" required>

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  minlength="6" placeholder="Mot de Passe" required>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password_confirmation" minlength="6" placeholder="Confirmez le Mot de Passe" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="header bg-teal">
                                <h2>
                                    Toutes les Agences
                                </h2>
                            </div>
                            <div class="body">

                                <label for="agence_id" class="form-label" >Agences</label>
                                <select name="agence_id" id="agence_id" class="form-control {{ $errors->has('agence_id') ? ' is-invalid' : '' }}" data-live-search="true">
                                    <option selected disabled>Sélectionner une agence</option>
                                    @foreach ($agences as $agence)
                                    <option value="{{ $agence->id }}">{{ $agence->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <div class="switch m-t-10">
                                    {{-- <label><input type="checkbox" name="status"><span class="lever switch-col-teal" >statut</span></label> --}}
                                    <input type="checkbox" id="publication" class="filled-in" name="status" value="1">
                                    <label for="publication">Publier</label>
                                </div>

                                {{-- <a href="{{ route('agent.show') }}"  class="btn btn-warning m-t-15 waves-effect"><i class="material-icons">reply</i>Retour</a> --}}
                                <button class="btn  bg-teal waves-effect m-t-15" type="submit"> <i class=" material-icons">save</i> Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- #END# Task Info -->
            </div>
        </div>
    </section>

    @endsection

    @push('scripts')

    <script src="{{ asset('backend/assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>


    @endpush

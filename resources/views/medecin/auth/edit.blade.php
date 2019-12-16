@extends('multiauth::layouts.app')

@section('title', 'Modification')

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
                <form method="POST" action=" {{route('admin.medecins.update',[$medecin->id])}}">
                    @csrf
                    @method('patch')
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="card">
                            <div class="header bg-teal">
                                <span class="card-title">Modification des informations de L'medecin</span>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li> <a href="{{route('medecin.register')}}" class="bg-green text-white"><i class="material-icons">add</i>Nouveau {{ ucfirst(config('multiauth.prefix')) }}</a></li>
                                            {{-- <li> <a href="{{route('medecin.roles')}}" class="bg-cyan text-white"><i class="material-icons">add</i>Nouveau Role</a></li> --}}
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
                                        <input id="name" type="text" value="{{ $medecin->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nom" required autofocus>

                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                    {{-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input id="username" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="username" value="{{ old('name') }}" placeholder="Nom d'Utilisateur" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div> --}}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" value="{{ $medecin->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Addresse E-Mail" required>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input id="telephone" type="telephone" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" placeholder="Numero de Téléphone" required>

                                @if ($errors->has('telephone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="card">
                <div class="header bg-teal">
                    <h2>
                        Toutes les agences
                    </h2>
                </div>
                <div class="body">

                    <label for="Agence" class="form-label" >Agence</label>
                    <select name="agence_id" id="agence_id" class=" {{ $errors->has('agence_id') ? ' is-invalid' : '' }}" data-live-search="true" >
                        <option selected disabled>Select Agence</option>
                        @foreach ($agences as $agence)
                        <option value="{{ $agence->id }}"
                            @if (in_array($agence->id,$medecin->agence->pluck('id')->toArray()))
                            selected
                            @endif >{{ $agence->name }}
                        </option>
                        @endforeach
                    </select>

                    <br>
                    <a href="{{ route('admin.medecins.index') }}"  class="btn btn-warning m-t-15 waves-effect"><i class="material-icons">reply</i>Retour</a>
                    <button class="btn bg-teal waves-effect m-t-15 pull-right" type="submit"><i class=" material-icons">done_all</i> {{ __('Mettre à jour ') }}</button>
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




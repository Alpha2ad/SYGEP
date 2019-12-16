@extends('multiauth::layouts.appAuth') 
@section('content')
<form method="POST" action="{{ route('agence.password.email') }}" aria-label="{{ __('Reset Organisation Password') }}">
    @csrf

<span>Entrez votre adresse e-mail</span>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">email</i>
        </span>
        <div class="form-line">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus aria-required="true">

            @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('E-mail') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Envoyer') }}
            </button>
        </div>
    </div>
</form>
@endsection
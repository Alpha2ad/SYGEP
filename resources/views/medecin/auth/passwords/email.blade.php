@extends('multiauth::layouts.appAuth')
@section('content')

@include('multiauth::message')
<form method="POST" action="{{ route('medecin.password.email') }}" aria-label="{{ __('Reset Organisation Password') }}">
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
        <div class="col-md-12 offset-md-0">
            <button type="submit" class="btn bg-teal">
                <i class=" material-icons">send</i>
                {{ __('Envoyer') }}
            </button>
        </div>

    </div>
</form>
@endsection

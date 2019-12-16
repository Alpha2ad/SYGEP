@extends('multiauth::layouts.appAuth')
@section('content')

<section class="">

    <form method="POST" action="{{ route('comptable.password.request') }}" aria-label="{{ __('Reinitialisation du mot de passe comptable') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <div class="msg">Connectez-vous et Commencer à Exploré</div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">person</i>
            </span>
            <div class="form-line">
                <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus aria-required="true">

                @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('E-mail') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
                <input id="password" type="password" placeholder="Nouveau Mot de Passe" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required aria-required="true">
            </div>
            @if ($errors->has('password'))
            <span class="invalid-feedback">
                <div class=" alert alert-danger">{{ $errors->first('password') }}</div>
            </span>
            @endif
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
                <input id="password" type="password" placeholder="Comirmer le Nouveau Mot de Passe" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required aria-required="true">
            </div>
            @if ($errors->has('password'))
            <span class="invalid-feedback">
                <div class=" alert alert-danger">{{ $errors->first('password') }}</div>
            </span>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-12 ">
                <button class="btn bg-teal waves-effect form-control" type="submit"><i class=" material-icons">done_all</i> {{ __('Valider') }}</button>
            </div>
        </div>
    </form>
</section>
@endsection

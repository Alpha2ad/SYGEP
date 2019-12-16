@extends('multiauth::layouts.appAuth')
@section('content')

<section class="">

    <form id="sign_in" method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Admin Login') }}" novalidate="novalidate">
                    @csrf
                    <div class="msg">Connectez-vous et Commencer à Exploré</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" placeholder="Adresse mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus aria-required="true">
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
                            <input id="password" placeholder="Mot de passe" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required aria-required="true">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" {{ old('remember') ? 'checked' : '' }} class="filled-in text-center chk-col-teal">
                            <label for="rememberme">Se Souvernir de Moi</label>
                        </div>
                        <div class="col-xs-6">
                            <button class="btn btn-block bg-teal waves-effect" type="submit"> <i class=" material-icons">exit_to_app</i> CONNEXION</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">

                        <div class="col-xs-6 align-right">
                            <a href="{{ route('admin.password.request') }}">Mot de Passe Oublié?</a>
                        </div>
                    </div>
                </form>


</div>
</div>
</div>
</section>
@endsection

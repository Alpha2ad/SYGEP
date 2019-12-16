@extends('multiauth::layouts.app')
@section('title', 'Ajout d\'un role')

@push('css')


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
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header bg-indigo">
                            <span class="card-title">Ajouter d'un nouveau Role</span>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li> <a href="{{route('admin.register')}}" class="bg-green text-white"><i class="material-icons">add</i>Nouveau {{ ucfirst(config('multiauth.prefix')) }}</a></li>
                                        <li> <a href="{{route('admin.roles')}}" class="bg-cyan text-white"><i class="material-icons">add</i>Nouveau Role</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form method="POST" action="{{ route('admin.role.store') }}">
                                @csrf
                                @include('multiauth::message')
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons large ">mode_edit</i>
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

                                <button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
                                <a href="{{ route('admin.roles') }}" class="btn btn-sm btn-danger float-right">Retour</a>

                            </form>
                            <!-- #END# Task Info -->
                        </div>
                    </div>
                </section>

                @endsection

                @push('scripts')



                @endpush



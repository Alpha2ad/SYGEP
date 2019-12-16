@extends('multiauth::layouts.app')
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
                        <div class="header bg-indigo ">
                            <span class="card-title">{{ $admins->count() }} Administrateur(s)</span>
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

                         @include('multiauth::message')

                         <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $key => $admin)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                         @foreach ($admin->roles as $role)
                                         <span class="badge bg-pink  ml-2">
                                            {{ $role->name }}
                                        </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="{{route('admin.edit',[$admin->id])}}" class=" mr-3 bg-blue text-white"><b><i class="material-icons">mode_edit</i>Modifier</b></a></li>
                                                    <li>
                                                        <a href="#" class=" mr-3 bg-red text-white" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();"><b><i class="material-icons">delete</i>Supprimer</b></a>
                                                        <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                                            @csrf @method('delete')
                                                        </form>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </td>

                                </tr>
                                @endforeach
                                @if($admins->count()==0)
                                <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->

    </div>
</div>
</section>
@endsection

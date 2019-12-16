@extends('multiauth::layouts.app') 

@section('title', 'Liste des roles')
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
                        <div class="header bg-indigo ">
                            <span class="card-title"></span>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li> <a href="{{ route('admin.role.create') }}" class="bg-green text-white"><i class="material-icons">add</i>Nouveau Role</a></li>
                                        <li> <a href="{{route('admin.register')}}" class="bg-green text-white"><i class="material-icons">add</i>Nouveau {{ ucfirst(config('multiauth.prefix')) }}</a></li>
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
                                   <tbody>
                                    @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td><strong>{{ $role->name }}</strong></td>
                                        <td>
                                            @foreach ($role->admins as $admin)
                                                <span class="badge"> {{$admin->email}}</span><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <span class="badge bg-pink text-white badge-pill">{{ $role->admins->count() }} {{ ucfirst(config('multiauth.prefix')) }}</span>
                                        </td>
                                        <td>
                                            <ul class="header-dropdown m-r--5">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">more_vert</i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li><a href="{{ route('admin.role.edit',$role->id) }}" class=" mr-3 bg-blue text-white"><b><i class="material-icons">mode_edit</i>Modifier</b></a></li>
                                                        <li>
                                                           <a href="" class="bg-red mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();"><i class="material-icons">delete</i>Spprimer</a>
                                                           <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete',$role->id) }}" method="POST" style="display: none;">
                                                            @csrf @method('delete')
                                                        </form>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </td>

                                </tr>
                                @endforeach
                                @if($roles->count()==0)
                                <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                                @endif
                            </tbody> 
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
@push('scripts')


@endpush
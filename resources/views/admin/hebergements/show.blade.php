@extends('multiauth::layouts.app')

@section('title', 'Liste des pelerins | ')

@push('css')
<!-- JQuery DataTable Css -->

<link href="{{ asset('backend/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')
<section class="content">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-teal card">
                        <h2 class=" text-capitalize">
                            {{$hebergement->nom}} <span class=" badge bg-white">{{$hebergement->nombre_chambre}}</span>
                            <small>{{$hebergement->adresse}}</small>
                            <small>{{$hebergement->telephone}}</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="{{route('admin.hebergements.index')}}" class=" waves-effect waves-block bg-teal"><i class=" material-icons">reply</i> Retour</a></li>
                                    <li><a href="{{route('admin.logements.create')}}" class=" waves-effect waves-block  bg-amber"><i class=" material-icons">add</i>Logement</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                          <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                              <tr>

                                <tr>
                                  <th>N°</th>
                                  <th>Agence</th>
                                  <th>Nom</th>
                                <th>Capacité</th>
                                  <th>Action</th>
                                </tr>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>N°</th>
                                <th>Agence</th>
                                <th>Nom</th>
                                <th>Capacité</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                            <tbody>

                             @foreach($hebergement->logements as $key=> $logement)

                             <tr>
                              <td>{{ $key +1 }}</td>
                              <td>{{$logement->hebergement->agence->name}}</td>
                              <td>{{ $logement->nom }}</td>
                              <td>{{ $logement->nombre_place }} places</td>
                              <td>
                                <a href="{{route('admin.logements.show',$logement->id)}} " class=" btn waves-effect bg-teal"><i class=" material-icons">visibility</i></a>
                             </td>

                           </tr>

                           @endforeach

                         </tbody>
                       </table>
                     </div>
                </div>
            </div>
</section>
@endsection
@push('scripts')

<!-- Jquery DataTable Plugin Js -->
<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('backend/assets/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/ui/dialogs.js') }}"></script>
<script src="{{ asset('backend/asssets/js/demo.js') }}"></script>

@endpush

@extends('agence.layouts.app')

@section('title', 'Liste des pelerins | ')

@push('css')
<!-- JQuery DataTable Css -->

<link href="{{ asset('backend/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')
<section class="content">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-teal">
                        <h2>
                           {{$tuteur->nom}} {{$tuteur->prenom }} <strong class=" badge bg-white">{{$tuteur->pelerins->count()}}</strong>
                           <small>{{$tuteur->telephone }} </small>
                           <small>{{$tuteur->email }} </small>

                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="{{route('tuteurs.index')}}" class=" waves-effect waves-block bg-teal"><i class=" material-icons">reply</i> Retour</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
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
                                  <th>Prenom</th>
                                  <th>Identifiant</th>
                                  <th>Action</th>
                                </tr>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>N°</th>
                                <th>Agence</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Identifiant</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                            <tbody>

                             @foreach($tuteur->pelerins as $key=> $pelerin)

                             <tr>
                              <td>{{ $key +1 }}</td>
                              <td>{{$pelerin->agence->name}}</td>
                              <td>{{ $pelerin-> nom }}</td>
                              <td>{{ $pelerin-> prenom }}</td>
                              <td>{{ $pelerin-> id_pelerin }}</td>
                              <td class=" align-right" >
                                
                                <a href="{{route('pelerins.show',$pelerin->id)}} " class=" btn waves-effect bg-teal"><i class=" material-icons">visibility</i></a>
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

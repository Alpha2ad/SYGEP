@extends('agent.layouts.app')

@section('title', 'Liste des pelerins | ')

@push('css')

<link href="{{ asset('backend/assets/plugins/bootstrap-material-datetimepicker/font/Material-Design-Icons.svg') }}" rel="stylesheet" type="text/css">
<!-- JQuery DataTable Css -->

<link href="{{ asset('backend/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">

@endpush

@section('content')

<section class="content">

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="button-demo">
            <a href="{{ route('agentPelerins.create') }}" type="button" class="btn bg-teal waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons">add</i> Ajouter</font></font></a>
      {{-- <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#formPelerin"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons large bold">add</i> Ajouter</font></font></button> --}}
      <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#exportationData"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons large bold">content_paste</i> EXPORTER</font></font></button>

      <button type="button" class="btn btn-info waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">INFO</font></font></button>
      <button type="button" class="btn btn-warning waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ATTENTION</font></font></button>
      <button type="button" class="btn btn-danger waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DANGER</font></font></button>
    </div>
  </div>
{{-- andmodal --}}
{{-- exportation modal --}}
<div class="modal fade" id="exportationData" tabindex="-1" role="dialog" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header header bg-teal">
        <h4 class="modal-title" id="largeModalLabel">Liste exportable <span class="badge bg-green ">{{ $pelerins->count() }}</span></h4>
      </div>
      <div class="modal-body">
        <!-- Exportable Table -->
        <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="">
                    {{-- <div class="header bg-teal">
                      <h2>
                        Touts les Pelerin
                        <span class="badge bg-yellow"> {{ $pelerins->count() }}</span>
                      </h2>
                      <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                          </a>
                          <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div> --}}
                    <div class="body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                          <thead>
                            <tr>

                              <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>N° Passeport</th>
                                <th>Identifiant</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Statut</th>
                                <th>Date de naissance</th>
                              </tr>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>N°</th>
                              <th>Nom</th>
                              <th>Prenom</th>
                              <th>N° Passeport</th>
                              <th>Identifiant</th>
                              <th>Telephone</th>
                              <th>Email</th>
                              <th>Statut</th>
                              <th>Date de naissance</th>
                            </tr>
                          </tfoot>
                          <tbody>

                           @foreach($pelerins as $key=> $pelerin)

                           <tr>
                            <td>{{ $key +1 }}</td>
                            <td>{{ $pelerin-> nom }}</td>
                            <td>{{ $pelerin-> prenom }}</td>
                            <td>{{ $pelerin-> num_passeport }}</td>
                            <td>{{ $pelerin-> id_pelerin }}</td>
                            <td>{{ $pelerin-> telephone }}</td>
                            <td>{{ $pelerin-> email }}</td>
                            <td>
                             @if($pelerin->status == true)

                             <span class="badge bg-blue">Normal</span>

                             @else

                             <span class="badge bg-red">En attente</span>

                             @endif
                           </td>
                           <td>{{ $pelerin-> date_naissance }}</td>

                         </tr>

                         @endforeach

                       </tbody>
                     </table>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <!-- #END# Exportable Table -->
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="material-icons">cancel</i>Ignorer </font></font></button>
        </div>
      </div>
    </div>
  </div>
  {{-- andExportationModal --}}
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header bg-teal">
          <h2>
            Liste des pelerins
            <span class="badge bg-white">{{ $pelerins-> count() }} </span>
          </h2>
          <ul class="header-dropdown m-r--5">
            <li class="dropdown">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">more_vert</i>
              </a>
              <ul class="dropdown-menu pull-right">
                <li><a href="javascript:void(0);">Action</a></li>
                <li><a href="javascript:void(0);" class="btn btn-warning waves-effect white-text"  data-toggle="modal" data-target="#exportationData"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons large bold">content_paste</i> Exportation</font></font></a></li>
                <li><a href="javascript:void(0);">Something else here</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_teal">
                    <thead>
                      <tr>
                        <tr>
                          <th>N°</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Numero Passeport</th>
                          <th>Identifiant</th>
                          <th>Telephone</th>
                          <th>Email</th>
                          <th>Statut</th>
                          <th>Date de naissance</th>
                          <th>Action </th>
                        </tr>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Numero Passeport</th>
                        <th>Identifiant</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Statut</th>
                        <th>Date de naissance</th>
                        <th>Action </th>
                      </tr>
                    </tfoot>
                    <tbody>

                     @foreach($pelerins as $key=> $pelerin)

                     <tr>
                      <td>{{ $key +1 }}</td>
                      <td>{{ $pelerin-> nom }}</td>
                      <td>{{ $pelerin-> prenom }}</td>
                      <td>{{ $pelerin-> num_passeport }}</td>
                      <td>{{ $pelerin-> id_pelerin }}</td>
                      <td>{{ $pelerin-> telephone }}</td>
                      <td>{{ $pelerin-> email }}</td>
                      <td>
                       @if($pelerin->status == true)

                       <span class="badge bg-blue">Normal</span>

                       @else

                       <span class="badge bg-red">En attente</span>

                       @endif
                     </td>
                     <td>{{ $pelerin-> date_naissance }}</td>
                     <td class=""> <ul class="header-dropdown m-r--5 ">
                       <li class="dropdown">
                         <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                           <i class="material-icons">more_vert</i>
                         </a>
                         <ul class="dropdown-menu pull-right ">
                           <li class="white"><a href="{{ route('agentPelerins.show', $pelerin->id) }}" class="btn waves-effect white"><i class="material-icons">visibility</i>Detail</a></li>
                           <li><a href="{{ route('agentPelerins.edit', $pelerin->id) }}" class="btn waves-effect white-text"><i class="material-icons">edit</i>Modification</a></li>
                           <li>
                           </li>
                           <li>
                            <form method="post" id="delete-form-{{ $pelerin->id }} " action="{{ route('agentPelerins.destroy', $pelerin->id) }}" style="display: none;">
                             @csrf
                             @method('DELETE')
                           </form>

                           <a  class="btn  waves-effect white-text" onclick="if(confirm('Est-vous sur de vouloir effectuez cette action??? Cette action est iréversible') ){
                             event.preventDefault();
                             document.getElementById('delete-form-{{ $pelerin->id }} ').submit();
                           }else{
                             event.preventDefault();
                           } "><i class="material-icons white" rel="tooltip" title="supression">delete</i>Suprimer</a>
                         </li>

                       </ul>
                     </li>
                   </ul>
                 </td>

               </tr>

               @endforeach

             </tbody>
           </table>
         </div>
       </div>

</section>

@endsection

@push('scripts')

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
<script src="{{ asset('backend/assets/js/demo.js') }}"></script>

@endpush

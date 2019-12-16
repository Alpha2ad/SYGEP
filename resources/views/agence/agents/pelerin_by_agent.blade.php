@extends('agence.layouts.app')

@section('title', 'Liste des pelerins | ')

@push('css')
<!-- JQuery DataTable Css -->

<link href="{{ asset('backend/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="block-header">

     {{-- <a class=" btn btn-primary waves-effect "  href=" {{ route('produits.create') }} "><i class="material-icons">add</i><span>Ajouter une Catégorie</span></a> --}}
   </div>
   <!-- Exportable Table -->
   <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header bg-teal">
          <h2 >
            Liste des pelerins de {{$agent->name}}
            <span class="badge bg-yellow">{{ $agent->pelerins->count() }}</span>
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
        </div>
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

                 @foreach($agent->pelerins as $key=> $pelerin)

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
<script src="{{ asset('backend/assets/js/pages/ui/dialogs.js') }}"></script>
<script src="{{ asset('backend/asssets/js/demo.js') }}"></script>

@endpush

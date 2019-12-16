@extends('multiauth::layouts.app')

@section('title', 'Liste des des bagages | ')

@push('css')
<!-- JQuery DataTable Css -->

<link href="{{ asset('backend/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#formBagages"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons large bold">add</i> Ajouter</font></font></button>

      <a class=" btn bg-teal waves-effect "  href=" {{ route('admin.bagages.create') }} "><i class="material-icons">add</i><span>Ajouter un Colis</span></a>
    </div>
    {{-- formulaire d'ajout de bagages --}}
    <form action="{{route('admin.bagages.store') }} " method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal fade " id="formBagages" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header card bg-teal">
              <h4 class="modal-title" id="defaultModalLabel">Les informations concernant le colis</h4>
              <span role="separator" class="divider"></span>
            </div>
            <div class="modal-body">
              <div class=" row">
                <div class="col-lg-4 col-sm-12">
                  <div class="input-group form-float">
                      {{-- <span class="input-group-addon">
                        <i class="material-icons">person</i>
                      </span> --}}
                      <div class="form-line">
                        <input type="double" min="0" class="form-control " placeholder="Quantité" name="poid_bagage" required>
                      </div>
                    </div>
                    <div class="input-group">
                      {{-- <span class="input-group-addon">
                        <i class="material-icons">person</i>
                      </span> --}}
                      <div class="form-line">
                        <input type="number" min="0" class="form-control " placeholder="Nombre de bagages" name="nombre_bagages" required>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-8 col-sm-12">
                    <label for="pelerin" class="form-label" >Selectionez le pelerin</label>
                    <span class=" divider"></span>
                    <select class="form-control show-tick" id="pelerin" name="pelerin"  data-live-search="true" >
                     @foreach($pelerins as $key=>$pelerin)
                     <option value="{{ $pelerin->id }}">
                      <span class="filter-option pull-left">{{ $pelerin->nom }} {{ $pelerin->prenom }} | <small class="text-muted bg-teal">{{ $pelerin->id_pelerin }}</small></span>
                    </option>
                    @endforeach
                  </select>
                </div>

              </div>
              <div class="col-sm-12">
                <div class="form-group">
                      {{-- <span class="input-group-addon">
                        <i class="material-icons">mode-edi</i>
                      </span> --}}
                      <div class="form-line">
                        <textarea rows="4" class="form-control no-resize" placeholder="Description..." name="description"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons">save</i> Enregistrer</font></font></button>
                  <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="material-icons">cancel</i>Ignorer </font></font></button>
                </div>
              </div>
            </div>
          </div>
        </form>
        {{-- fin de formulaire d'ajout de bagages --}}
        <!-- Exportable Table -->
        <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header bg-teal card">
                <h2 >
                  Liste des bagages
                  <span class="badge bg-white">{{ $bagages->count()}}</span>
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
                          <th>Pelerin(e)</th>
                          <th>Nombre de Bagages</th>
                          <th>Quantite de bagages en (Kg) </th>
                          <th>Action</th>
                        </tr>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>N°</th>
                        <th>Pelerin(e)</th>
                        <th>Nombre de Bagages</th>
                        <th>Quantite de bagages en (Kg) </th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>

                     @foreach($bagages as $key=> $bagage)

                     <tr>
                      <td>{{ $key +1 }}</td>
                      <td>{{ $bagage->pelerin->prenom }} {{ $bagage->pelerin->nom }} <span class=" badge bg-teal">{{ $bagage->pelerin->id_pelerin }}</span></td>
                      <td>{{ $bagage->nombre_bagages }}</td>
                      <td>{{ $bagage->poid_bagage }}</td>
                {{-- <td>
                 @if($pelerin->status == true)

                 <span class="badge bg-blue">Normal</span>

                 @else

                 <span class="badge bg-red">En attente</span>

                 @endif
               </td>
               <td>{{ $pelerin-> date_naissance }}</td> --}}

               <td class=""> <ul class="header-dropdown m-r--5 ">
                <li class="dropdown">
                  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                  </a>
                  <ul class="dropdown-menu pull-right ">
                    <li class="white"><a href="{{ route('admin.bagages.show', $bagage->id) }}" class="btn waves-effect white"><i class="material-icons">visibility</i>Detail</a></li>
                    <li><a href="{{ route('admin.bagages.edit', $bagage->id) }}" class="btn waves-effect white-text"><i class="material-icons">edit</i>Modification</a></li>
                    <li>
                    </li>
                    <li>
                     <form method="post" id="delete-form-{{ $bagage->id }} " action="{{ route('admin.bagages.destroy', $bagage->id) }}" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>

                    <a  class="btn  waves-effect white-text" onclick="if(confirm('Est-vous sur de vouloir effectuez cette action??? Cette action est iréversible') ){
                      event.preventDefault();
                      document.getElementById('delete-form-{{ $bagage->id }} ').submit();
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

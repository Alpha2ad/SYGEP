@extends('agence.layouts.app')

@section('title', 'Liste des hebergements | ')

@push('css')
<!-- JQuery DataTable Css -->

<link href="{{ asset('backend/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      {{-- <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#formhebergements"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons large bold">add</i> Ajouter</font></font></button> --}}

      <a class=" btn waves-effect  bg-teal"  href=" {{ route('hebergements.create') }} "><i class="material-icons">add</i><span>Ajouter un hébergement</span></a>
    </div>
    {{-- formulaire d'ajout de hebergements --}}

        {{-- fin de formulaire d'ajout de hebergements --}}
        <!-- Exportable Table -->
        <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header bg-teal card">
                <h2 >
                  Liste des hebergements
                  <span class="badge bg-white">{{ $hebergements->count()}}</span>
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
                          <th>Adresse</th>
                          <th>Telephone </th>
                          <th>Agence </th>
                          <th>Statut </th>
                          <th>Action</th>
                        </tr>
                      </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Telephone </th>
                            <th>Capacité </th>
                            <th>Statut </th>
                            <th>Action</th>
                          </tr>
                    </tfoot>
                    <tbody>

                     @foreach($hebergements as $key=> $hebergement)

                     <tr>
                      <td>{{ $key +1 }}</td>
                      <td>{{ $hebergement->nom }}</td>
                      <td>{{ $hebergement->adresse }}</td>
                      <td>{{ $hebergement->telephone }}</td>
                      <td>{{ $hebergement->nombre_chambre }} prs</td>
                <td>
                 @if($hebergement->status == true)

                 <span class="badge bg-blue">Normal</span>

                 @else

                 <span class="badge bg-red">En attente</span>

                 @endif
               </td>

               <td class=""> <ul class="header-dropdown m-r--5 ">
                <li class="dropdown">
                  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                  </a>
                  <ul class="dropdown-menu pull-right ">

                    <li>
                                                    @if ($hebergement->status == true)
                                                    <form method="POST" id="activation-{{ $hebergement->id }} " action="{{ route('agencehebergement.approuve', [$hebergement->id]) }}" style="display: none;">
                                                            @csrf
                                                            @method('PUT')
                                                        </form>

                                                        <a type="button" class="mr-3 bg-amber text-white" onclick="if(confirm('Est-vous sur de vouloir Activé la hebergement {{$hebergement->name}}???') ){
                                                            event.preventDefault();
                                                            document.getElementById('activation-{{ $hebergement->id }} ').submit();
                                                        }else{
                                                            event.preventDefault();
                                                        } "><i class="material-icons" rel="tooltip" title="desactivation de compte">block</i>Désactivé</a>
                                                        @else
                                                        <form method="POST" id="desactivation-form-{{ $hebergement->id }} " action="{{ route('agencehebergement.approuve', [$hebergement->id]) }}" style="display: none;">
                                                                @csrf
                                                                @method('PUT')
                                                            </form>

                                                            <a type="button" class="mr-3 bg-green text-danger" onclick="if(confirm('Est-vous sur de vouloir Activé la hebergement {{$hebergement->name}}???') ){
                                                                event.preventDefault();
                                                                document.getElementById('desactivation-form-{{ $hebergement->id }} ').submit();
                                                            }else{
                                                                event.preventDefault();
                                                            } "><i class="material-icons" rel="tooltip" title="supression">done_all</i>Activé</a>
                                                    @endif
                                             </li>
                                             <li class="white"><a href="{{ route('hebergements.show', $hebergement->id) }}" class="btn waves-effect white"><i class="material-icons">visibility</i>Detail</a></li>
                    <li><a href="{{ route('hebergements.edit', $hebergement->id) }}" class="btn waves-effect white-text"><i class="material-icons">edit</i>Modification</a></li>
                    <li>
                    </li>
                    <li>
                     <form method="post" id="delete-form-{{ $hebergement->id }} " action="{{ route('hebergements.destroy', $hebergement->id) }}" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>

                    <a  class="btn  waves-effect white-text" onclick="if(confirm('Est-vous sur de vouloir effectuez cette action??? Cette action est iréversible') ){
                      event.preventDefault();
                      document.getElementById('delete-form-{{ $hebergement->id }} ').submit();
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

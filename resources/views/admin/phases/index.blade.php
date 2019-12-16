@extends('multiauth::layouts.app')

@section('title', 'phases | ')

@push('css')
<!-- JQuery DataTable Css -->

<link href="{{ asset('backend/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">

           <a class=" btn bg-teal waves-effect "  href=" {{ route('admin.phases.create') }} "><i class="material-icons">add</i><span>Ajouter une phase</span></a>
       </div>
       <!-- Exportable Table -->
       <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-teal">
                    <h2 >
                        Toutes les phases
                        <span class="badge bg-white">{{ $phases->count() }}</span>
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
                                    <th>N°</th>
                                    <th>Phase</th>
                                    <th>Nbre de convoits</th>
                                    <th>Nbr de bagages</th>
                                    <th>Statut</th>
                                    <th>Action </th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Phase</th>
                                    <th>Nbre de convoits</th>
                                    <th>Nbr de bagages</th>
                                    <th>Statut</th>
                                    <th>Action </th>
                                </tr>
                            </tfoot>
                            <tbody>

                               @foreach($phases as $key=>$phase)

                               <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $phase->nom }}</td>
                                <td>{{ $phase->convoits->count() }}</td>
                                <td>{{ $phase->bagages->count() }}</td>
                                <td>
                                        @if($phase->status == true)

                                        <span class="badge bg-blue">Activé</span>

                                        @else

                                        <span class="badge bg-red">Desactivé</span>

                                        @endif
                                      </td>
                                <td> <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="{{ route('admin.phases.edit', $phase->id) }}" class=" bg-teal" ><i class="material-icons">edit</i>Modification</a></li>
                                            <li>
                                                    @if ($phase->status == true)
                                                    <form method="POST" id="activation-{{ $phase->id }} " action="{{ route('admin.phase.approuve', [$phase->id]) }}" style="display: none;">
                                                            @csrf
                                                            @method('PUT')
                                                        </form>

                                                        <a type="button" class="mr-3 bg-amber text-white" onclick="if(confirm('Est-vous sur de vouloir Activé la phase {{$phase->name}}???') ){
                                                            event.preventDefault();
                                                            document.getElementById('activation-{{ $phase->id }} ').submit();
                                                        }else{
                                                            event.preventDefault();
                                                        } "><i class="material-icons" rel="tooltip" title="desactivation de compte">block</i>Désactivé</a>
                                                        @else
                                                        <form method="POST" id="desactivation-form-{{ $phase->id }} " action="{{ route('admin.phase.approuve', [$phase->id]) }}" style="display: none;">
                                                                @csrf
                                                                @method('PUT')
                                                            </form>

                                                            <a type="button" class="mr-3 bg-green text-danger" onclick="if(confirm('Est-vous sur de vouloir Activé la phase {{$phase->name}}???') ){
                                                                event.preventDefault();
                                                                document.getElementById('desactivation-form-{{ $phase->id }} ').submit();
                                                            }else{
                                                                event.preventDefault();
                                                            } "><i class="material-icons" rel="tooltip" title="supression">done_all</i>Activé</a>
                                                    @endif
                                             </li>
                                            <li>
                                               <form method="POST" id="delete-form-{{ $phase->id }} " action="{{ route('admin.phases.destroy', $phase->id) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <a  class=" bg-red " onclick="if(confirm('Est-vous sur de vouloir supprimé cette phase???') ){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $phase->id }} ').submit();
                                            }else{
                                                event.preventDefault();
                                            } "><i class="material-icons" rel="tooltip" title="supression">delete</i>Suprimer</a>
                                        </li>


                                    </ul>
                                </li>
                            </ul></td>

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

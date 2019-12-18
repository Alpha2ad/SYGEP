@extends('medecin.layouts.app')

@section('content')
<section class="content">
            <div class="container-fluid">
    <div class="button-demo">
            <a href="{{ route('medecinOrdonnances.create') }}" type="button" class="btn bg-teal waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons">add</i> Rediger un rapport</font></font></a>
      {{-- <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#formPelerin"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons large bold">add</i> Ajouter</font></font></button> --}}
      {{-- <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#exportationData"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons large bold">content_paste</i> EXPORTER</font></font></button>

      <button type="button" class="btn btn-info waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">INFO</font></font></button>
      <button type="button" class="btn btn-warning waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ATTENTION</font></font></button>
      <button type="button" class="btn btn-danger waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DANGER</font></font></button> --}}
    </div>

                <div class="row clearfix">
                    <!-- Task teal -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="header bg-teal">
                                <h2>Liste des rapports medical</h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_teal">
                                        <thead>
                            <tr>
                              <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Statut</th>
                                <th>Action</th>
                              </tr>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>N°</th>
                              <th>Nom</th>
                              <th>Statut</th>
                              <th>Action</th>
                            </tr>
                          </tfoot>
                          <tbody>

                           @foreach($ordonnances as $key=> $ordonnance)

                           <tr>
                            <td>{{ $key +1 }}</td>
                            <td>{{ $ordonnance-> nom }}</td>
                            <td>
                             @if($ordonnance->status == true)

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
                           <li class="white"><a href="{{ route('medecinOrdonnances.show', $ordonnance->id) }}" class="btn waves-effect white"><i class="material-icons">visibility</i>Detail</a></li>
                           <li><a href="{{ route('medecinOrdonnances.edit', $ordonnance->id) }}" class="btn waves-effect white-text"><i class="material-icons">edit</i>Modification</a></li>
                           <li>
                           </li>
                           <li>
                            <form method="post" id="delete-form-{{ $ordonnance->id }} " action="{{ route('medecinOrdonnances.destroy', $ordonnance->id) }}" style="display: none;">
                             @csrf
                             @method('DELETE')
                           </form>

                           <a  class="btn  waves-effect white-text" onclick="if(confirm('Est-vous sur de vouloir effectuez cette action??? Cette action est iréversible') ){
                             event.preventDefault();
                             document.getElementById('delete-form-{{ $ordonnance->id }} ').submit();
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
                    <!-- #END# Task Info -->
                </div>
            </div>
        </section>
@endsection

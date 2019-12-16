@extends('multiauth::layouts.app')

@section('title', 'Liste des pelerins')

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
    <div class="">
                    {{-- <div class="header">
                        <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            BOUTONS DE DÉFAUT DE BOOTSTRAP
                             </font></font><small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Utilisez n’importe laquelle des classes de boutons disponibles pour créer rapidement un bouton stylé</font></font></small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">plus_vert</font></font></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                      </div> --}}
                      <div class="button-demo">
                        <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons large bold">add</i> Ajouter</font></font></button>
                        <button type="button" class="btn btn-primary waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PRIMAIRE</font></font></button>
                        <button type="button" class="btn btn-success waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SUCCÈS</font></font></button>
                        <button type="button" class="btn btn-info waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">INFO</font></font></button>
                        <button type="button" class="btn btn-warning waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ATTENTION</font></font></button>
                        <button type="button" class="btn btn-danger waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DANGER</font></font></button>
                      </div>
                    {{-- <div class="body">

                    </div> --}}
                  </div>
                </div>
                <form method="POST" action="{{ route('admin.pelerins.store') }} " enctype="multipart/form-data">
                  @csrf
                  <div class="modal fade " id="defaultModal" tabindex="-1" role="dialog" style="display: none;">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                          <span role="separator" class="divider"></span>
                        </div>
                        <div class="modal-body">
                          <div class=" row">
                            <div class="col-lg-6 col-sm-12">
                              <div class="input-group form-float">
                                <span class="input-group-addon">
                                  <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                  <input type="text" class="form-control date" placeholder="Nom" name="nom" required>
                                </div>
                              </div>
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                  <input type="text" class="form-control date" placeholder="Prenom(s)" name="prenom" required>
                                </div>
                              </div>
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="material-icons">phone_iphone</i>
                                </span>
                                <div class="form-line">
                                  <input type="text" class="form-control mobile-phone-number" placeholder="Telephone" required name="telephone">
                                </div>
                              </div>
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="material-icons">credit_card</i>
                                </span>
                                <div class="form-line">
                                  <input type="text" class="form-control credit-card" placeholder="N° Passeport" name="num_passeport" required>
                                </div>
                              </div>
                              <label for="agent" class="form-label" >agents</label>
                          <select class="form-control show-tick" id="agent" name="agent "  data-live-search="true" >
                           @foreach($agents as $key=>$agent)
                           <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                           @endforeach
                         </select>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="material-icons">email</i>
                                </span>
                                <div class="form-line">
                                  <input type="text" class="form-control email" placeholder="Ex: example@example.com" name="email" required>
                                </div>
                              </div>
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                  <input type="text" class="form-control date" placeholder="date de naissance" name="date_naissance" required>
                                </div>
                              </div>
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                  <input type="text" class="form-control date" placeholder="date de delivrance passeport" required name="date_delivrance">
                                </div>
                              </div>
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                  <input type="text" class="form-control date" placeholder="date d'expiration passeport" required name="date_expiration">
                                </div>
                              </div>
                            </div>
                            <label for="image">Image du pelerin(e)</label>
                              <div class="form-group">
                                <input type="file" id="image" placeholder="Image de l'aricle" name="image" required>
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
              {{-- andmodal --}}

              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                    <div class="header bg-teal">
                      <h2>
                        Touts les Articles
                        <span class="badge bg-yellow">{{ $pelerins-> count() }} </span>
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
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
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
                           <td> <ul class="header-dropdown m-r--5">
                             <li class="dropdown">
                               <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                 <i class="material-icons">more_vert</i>
                               </a>
                               <ul class="dropdown-menu pull-right">
                                 <li><a href="{{ route('admin.pelerins.show', $pelerin->id) }}" ><i class="material-icons">visibility</i>Detail</a></li>
                                 <li><a href="{{ route('admin.pelerins.edit', $pelerin->id) }}" ><i class="material-icons">edit</i>Modification</a></li>
                                 <li>
                                </li>
                                <li>
                                  <form method="post" id="delete-form-{{ $pelerin->id }} " action="{{ route('admin.pelerins.destroy', $pelerin->id) }}" style="display: none;">
                                   @csrf
                                   @method('DELETE')
                                 </form>

                                 <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Est-vous sur de vouloir effectuez cette action??? Cette action est iréversible') ){
                                   event.preventDefault();
                                   document.getElementById('delete-form-{{ $pelerin->id }} ').submit();
                                 }else{
                                   event.preventDefault();
                                 } "><i class="material-icons" rel="tooltip" title="supression">delete</i>Suprimer</button>
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
             <script src="{{ asset('backend/assets/js/pages/basic-form-elements.js') }}"></script>
             <script src="{{ asset('backend/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
 {{-- <script src="{{ asset('backend/assets/plugins/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-steps/jquery.steps.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/ui/dialogs.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/momentjs/moment.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/momentjs/ender.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/momentjs/package.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>

<script src="{{ asset('backend/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-inputmask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('backend/assets/pages/forms/advanced-form-elements.js') }}"></script>
<script src="{{ asset('backend/assets/js/demo.js') }}"></script> --}}

@endpush

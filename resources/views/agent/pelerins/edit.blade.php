@extends('agent.layouts.app')

@section('title', 'Lite des pelerins')

@push('css')

<link href="{{ asset('backend/assets/plugins/bootstrap-material-datetimepicker/font/Material-Design-Icons.svg') }}" rel="stylesheet" type="text/css">
<!-- JQuery DataTable Css -->

<link href="{{ asset('backend/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('backend/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">

@endpush

@section('content')

<section class="content">
  <div class="container-fluid">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="">
        {{-- <div class="header bg-teal">
          <h2>
            Modification des informations du pelerin

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
          <form method="POST" action="{{ route('agentPelerins.update', $pelerin->id) }} " enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="header bg-teal">
                    <h2>
                     Les informations du pelerin
                   </h2>
                 </div>
                 <div class="body">
                  <div class=" row">
                    <div class="col-lg-6 col-sm-12">
                      <div class="input-group form-float">
                        <span class="input-group-addon">
                          <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                          <input type="text" class="form-control date" value="{{ $pelerin->nom}} " name="nom" required>
                        </div>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                          <input type="text" class="form-control date" value="{{ $pelerin->prenom}} "  name="prenom" required>
                        </div>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="material-icons">phone_iphone</i>
                        </span>
                        <div class="form-line">
                          <input type="text" class="form-control mobile-phone-number" value="{{ $pelerin->telephone}} " required name="telephone">
                        </div>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="material-icons">credit_card</i>
                        </span>
                        <div class="form-line">
                          <input type="text" class="form-control credit-card" value="{{ $pelerin->num_passeport}} " name="num_passeport" required>
                        </div>
                      </div>
                      {{-- <label for="agent" class="form-label" >agents</label>
                      <select class="form-control show-tick" id="agent" name="agent "  data-live-search="true" >
                            @foreach($agents as $key=>$agent)
                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                            @endforeach
                     </select> --}}

                   </div>

                   <div class="col-lg-6 col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">email</i>
                      </span>
                      <div class="form-line">
                        <input type="text" class="form-control email" value="{{ $pelerin->email}} " name="email" required>
                      </div>
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">date_range</i>
                      </span>
                      <div class="form-line">
                        <input type="text" class="form-control date" value="{{ $pelerin->date_naissance}} " name="date_naissance" required>
                      </div>
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">date_range</i>
                      </span>
                      <div class="form-line">
                        <input type="text" class="form-control date" value="{{ $pelerin->date_delivrance}} " required name="date_delivrance">
                      </div>
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">date_range</i>
                      </span>
                      <div class="form-line">
                        <input type="text" class="form-control date" value="{{ $pelerin->date_expiration}} " required name="date_expiration">
                      </div>
                    </div>
                  </div>
                  <label for="image">Image du pelerin(e)</label>
                  <div class="form-group">
                    <input type="file" id="image" placeholder="Image de l'aricle" name="image" value="{{$pelerin->image}} " >
                  </div>
                  <a href=""  class="btn btn-warning m-t-15 waves-effect"><i class="material-icons">reply</i>RETOUR</a>
                 <button type="submit" class="btn btn-primary m-t-15 waves-effect"><i class="material-icons">update</i> MODIFIER</button>
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="card">
              <div class="header bg-indigo">
                <h2>
                  agent, Convoit et Catégorie
                </h2>
              </div>
              <div class="body">

                <label for="agent" class="form-label" >agents</label>
                <select class="form-control show-tick" id="agent" name="agent "  data-live-search="true" >
                 @foreach($agents as $key=>$agent)
                 <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                 @endforeach
               </select>
               <br>
               <label for="Tags" class="form-label"> Convoits</label>
                  <select class="form-control show-tick"  data-live-search="true" id="convoit" name="convoit ">
                   @foreach($convoits as $key=>$convoit)
                   <option value="{{ $convoit->id }}">{{ $convoit->type_avion }}</option>
                   @endforeach
                 </select>
                 <br>
                 <label for="Tags" class="form-label"> categorie</label>
                 <select class="form-control show-tick"  data-live-search="true" id="convoit" name="categorie ">
                    @foreach($categories as $key=>$category)
                   <option value="{{ $category->id }}">{{ $category->nom }}</option>
                   @endforeach
                 </select>
                 <br>
                 <a href=""  class="btn btn-warning m-t-15 waves-effect"><i class="material-icons">reply</i>Retour</a>
                 <button type="submit" class="btn btn-primary m-t-15 waves-effect">Enregistrer</button>
               </div>
             </div>
           </div>
         </div> --}}
         <!-- #END# Vertical Layout -->
       </div>
       <div role="tabpanel" class="tab-pane fade" id="settings">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, ipsam cum mollitia eaque soluta vero repudiandae ducimus aliquid reprehenderit quisquam odit itaque aut maxime expedita illum rem optio numquam voluptates!
      </div>
    </div>
  </div>


</section>

@endsection

@push('scripts')

<script src="{{ asset('backend/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
{{-- <script src="{{ asset('backend/assets/plugins/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-steps/jquery.steps.js') }}"></script> --}}
<script src="{{ asset('backend/assets/js/pages/ui/dialogs.js') }}"></script>



@endpush

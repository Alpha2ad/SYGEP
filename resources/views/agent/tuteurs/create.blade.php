@extends('agent.layouts.app')

@section('title', 'Liste des tuteurs | ')

@push('css')
<!-- JQuery DataTable Css -->

<link href="{{ asset('backend/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="card " >
      <div class="header bg-teal">
        <strong class="">Page d'enregistrer de pelerin(es) </strong>
        <ul class="header-dropdown m-r--5">
          <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">more_vert</i>
            </a>
            <ul class="dropdown-menu pull-right">
              {{-- <li class=" bg-teal"><a href="javascript:void(0);" class=" bg-teal" data-toggle="modal" data-target="#formPelerin"><i class=" material-icons">add</i> de Pelerin</a></li> --}}
              <li><a href="javascript:void(0);">Another action</a></li>
              <li><a href="javascript:void(0);">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <!-- Vertical Layout -->
    <form method="POST" action="{{ route('agentTuteurs.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-teal">
              <h2>
                Les information du tuteur
              </h2>
            </div>
            <div class="body">
              <div class=" row">
                <div class="input-group form-float">
                  <span class="input-group-addon">
                    <i class="material-icons">person</i>
                  </span>
                  <div class="form-line">
                    <input type="text" class="form-control date" placeholder="Nom complet de la personne physique/morale" name="nom" required>
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
                    <i class="material-icons">email</i>
                  </span>
                  <div class="form-line">
                    <input type="text" class="form-control email" placeholder="Ex: example@example.com" name="email" required>
                  </div>
                </div>
                <div class="form-line">
                  <textarea rows="4" class="form-control no-resize" placeholder="Description..." name="description"></textarea>
                </div>
              </div>
              <div class=" align-right">
                  <br>
              <a href="{{ route('agentTuteurs.index') }}"  class="btn btn-warning m-t-15 waves-effect"><i class="material-icons">reply</i>Retour</a>
              <button type="submit" class="btn bg-teal m-t-15 waves-effect"><i class=" material-icons">save</i> Enregistrer</button>
              </div>
            </div>
          </div>

      </div>
    </form>
    <!-- #END# Vertical Layout -->

  </div>
</section>

@endsection

@push('scripts')

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('backend/assets/js/pages/ui/dialogs.js') }}"></script>
<script src="{{ asset('backend/asssets/js/demo.js') }}"></script>

@endpush

@extends('multiauth::layouts.app')
@section('title', 'Ajout | ')

@push('css')

<link rel="stylesheet" href="{{ asset('backend/assets/plugins/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}"> --}}

@endpush
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header card-header">
            <h2></h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">


            <div class="row clearfix">
                <!-- Task Info -->
                <form method="POST" action="{{ route('admin.convoits.store') }}">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="card">
                            <div class="header bg-teal card">
                                <span class="card-title">Les informations concernant le <strong>convoit</strong></span>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            {{-- <li> <a href="{{route('admin.bagages.create')}}" class="bg-green text-white"><i class="material-icons">add</i>De bagages</a></li> --}}
                                            <li> <a href="{{route('admin.convoits.index')}}" class="bg-teal text-white"><i class="material-icons">visibility</i>Liste des convoits</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                @include('multiauth::message')
                                <div class="input-group form-float">
                                        <span class="input-group-addon">
                                          <i class="material-icons">person</i>
                                      </span>
                                      <div class="form-line">
                                          <input type="text"  class="form-control " placeholder="Nom" name="nom" required>
                                      </div>
                                  </div>
                                  <div class="input-group form-float">
                                        <span class="input-group-addon">
                                          <i class="material-icons">flight</i>
                                      </span>
                                      <div class="form-line">
                                          <input type="text"  class="form-control " placeholder="Type de vol" name="type_vol" required>
                                      </div>
                                  </div>
                                  <div class="input-group form-float">
                                        <span class="input-group-addon">
                                          <i class="material-icons"> flight_takeoff</i>
                                      </span>
                                      <div class="form-line">
                                          <input type="text"  class="form-control " placeholder="Ville de départ" name="ville_depart" required>
                                      </div>
                                  </div>
                                  <div class="input-group form-float">
                                        <span class="input-group-addon">
                                          <i class="material-icons">flight_land</i>
                                      </span>
                                      <div class="form-line">
                                          <input type="text"  class="form-control " placeholder="Ville d'arrivée" name="ville_arriver" required>
                                      </div>
                                  </div>
                                   <div class="input-group form-float">
                                        <span class="input-group-addon">
                                          <i class="material-icons">date_range</i>
                                      </span>
                                      <div class="form-line">
                                          <input type="datetime-local"  class="form-control " placeholder="Heure de départ" name="date_depart" required>
                                      </div>
                                  </div>
                                   <div class="input-group form-float">
                                        <span class="input-group-addon">
                                          <i class="material-icons">date_range</i>
                                      </span>
                                      <div class="form-line">
                                          <input type="datetime-local"  class="form-control " placeholder="date d'arrivée" name="date_arriver" required>
                                      </div>
                                  </div>
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                          <i class="material-icons">group</i>
                                      </span>
                                      <div class="form-line">
                                          <input type="number" min="0" class="form-control " placeholder="Nombre de place" name="capacite" required>
                                      </div>
                                  </div><br>
                                  <div class="form-line">
                                        <textarea rows="4" class="form-control no-resize" placeholder="Description..." name="description"></textarea>
                                    </div>
                              </div>

                          </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-teal card">
                                <h2>
                                    Les informations suplémentaire
                                </h2>
                            </div>
                            <div class="body">
                                <label for="agence" class="form-label" >Selectionnez un agence</label>
                                <select class="form-control show-tick" id="agence" name="agences[]" multiple data-live-search="true" >
                                    <option disabled selected>Aucun element selectionner</option>
                                    @foreach($agences as $key=>$agence)
                                    <option value="{{ $agence->id }}">{{ $agence->name }} </option>
                                   @endforeach
                               </select>
                               <br> <br>
                               <label for="phase" class="form-label" >Selectionnez un phase</label>
                                <select class="form-control show-tick" id="phase" name="phase" required data-live-search="true" >
                                    @foreach($phases as $key=>$phase)
                                    <option value="{{ $phase->id }}" >{{ $phase->nom }}</option>
                                   @endforeach
                               </select>
                               <br>
                            <div class="switch m-t-10">
                                {{-- <label><input type="checkbox" name="status"><span class="lever switch-col-teal" >statut</span></label> --}}
                                <input type="checkbox" id="publication" class="filled-in" name="status" value="1">
                                <label for="publication">Publier</label>
                            </div>
                            {{-- <a href="{{ route('agence.show') }}"  class="btn btn-warning m-t-15 waves-effect"><i class="material-icons">reply</i>Retour</a> --}}
                            <button type="submit" class="btn bg-teal m-t-15 waves-effect"><i class=" material-icons">save</i> Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- #END# Task Info -->
        </div>
    </div>
</section>

@endsection

@push('scripts')

<script src="{{ asset('backend/assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<script src="{{ asset('backend/assets/plugins/tinymce/tinymce.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/ckeditor/ckeditor.js') }}"></script>

<script>
  $(function () {

//TinyMCE
tinymce.init({
  selector: "textarea#tinymce",
  theme: "modern",
  height: 300,
  plugins: [
  'advlist autolink lists link image charmap print preview hr anchor pagebreak',
  'searchreplace wordcount visualblocks visualchars code fullscreen',
  'insertdatetime media nonbreaking save table contextmenu directionality',
  'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true
});
tinymce.suffix = ".min";
tinyMCE.baseURL = '{{ asset('backend/assets/plugins/tinymce') }}';
});
</script>
@endpush

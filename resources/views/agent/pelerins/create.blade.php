@extends('agent.layouts.app')

@section('title', 'Ajout | ')

@push('css')

<link rel="stylesheet" href="{{ asset('backend/assets/plugins/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

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
              <li class=" bg-teal"><a href="javascript:void(0);" class=" bg-teal" data-toggle="modal" data-target="#formPelerin"><i class=" material-icons">add</i> de Tuteur</a></li>
              <li><a href="javascript:void(0);">Another action</a></li>
              <li><a href="javascript:void(0);">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <form action="{{route('tuteurs.store')}} " method="post">
      @csrf
      <div class="modal fade " id="formPelerin" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-teal">
              <h4 class="modal-title" id="defaultModalLabel">Enregistrement d'un nouveau Tuteur</h4>
              <span role="separator" class="divider"></span>
            </div>
            <div class="modal-body">
              <div class=" row">
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
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn bg-teal waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons">save</i> Enregistrer</font></font></button>
              <button type="button" class="btn bg-amber waves-effect" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="material-icons">cancel</i>Ignorer </font></font></button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- Vertical Layout -->
    <form method="POST" action="{{ route('agentPelerins.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row clearfix">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <div class="card">
            <div class="header bg-teal">
              <h2>
                Les information du pelerin
              </h2>
            </div>
            <div class="body">
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
                    <input type="text" class="form-control " placeholder="Prenom(s)" name="prenom" required>
                  </div>
                </div>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="material-icons">phone_iphone</i>
                  </span>
                  <div class="form-line">
                    <input type="phone" class="form-control mobile-phone-number" placeholder="Telephone" required name="telephone">
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

                {{-- <label for="agence" class="form-label" >TYPE</label> --}}
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="material-icons">email</i>
                  </span>
                  <div class="form-line">
                    <input type="email" class="form-control email" placeholder="Ex: example@example.com" name="email" required>
                  </div>
                </div>

                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="material-icons">date_range</i>
                  </span>
                  <small>Date de naissance</small>
                  <div class="form-line">

                    <input type="date" class="form-control date" placeholder="date de naissance" name="date_naissance" required>
                  </div>
                </div>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="material-icons">date_range</i>
                  </span>
                  <div class="form-line">
                      <small>Date de delivrance passeport </small>
                    <input type="date" class="form-control date" placeholder="date de delivrance passeport" required name="date_delivrance">
                  </div>
                </div>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="material-icons">date_range</i>
                  </span>
                  <div class="form-line">
                      <small>date d'expiration passeport </small>
                    <input type="date" class="form-control date" placeholder="date d'expiration passeport" required name="date_expiration">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="file" id="image" placeholder="Image du pelerin" name="image" required>
              </div>
              {{-- <label for="publication">Publier</label> --}}

            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="card">
            <div class="header bg-teal">
              <h2>
                Selection d'appartenance
              </h2>
            </div>
            <div class="body">
              <label for="agence" class="form-label" >Selectionnez la categorie </label>
              <select class="form-control show-tick" id="type" name="type"  data-live-search="true" >
                <option disabled selected>Aucune categorie selectionner</option>
                <option value="Ordinaire">Ordinaire </option>
                <option value="VIP">VIP</option>
              </select>
              <br>
              <br>

              <br>

              <br>
              <label for="tuteurs" class="form-label"> Selectionnez le Tuteur</label>
              <select class="form-control show-tick"  data-live-search="true" id="tuteurs" name="tuteur">
                <option disabled selected>Aucun element selectionner</option>
                @foreach($tuteurs as $key=>$tuteur)
                <option value="{{ $tuteur->id }}">
                  <small>{{ $tuteur->nom }} {{ $tuteur->prenom }} ({{ $tuteur->telephone }}) </small>
                </option>
                @endforeach
              </select>
              <br>
              <br>
              <a href="{{ route('pelerins.index') }}"  class="btn btn-warning m-t-15 waves-effect"><i class="material-icons">reply</i>Retour</a>
              <button type="submit" class="btn bg-teal m-t-15 waves-effect"><i class=" material-icons">save</i> Enregistrer</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-teal">
              <h2>
                Les informations ou une description si necessaire
              </h2>
              <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#formPelerin">Action</a></li>
                    <li><a href="javascript:void(0);">Another action</a></li>
                    <li><a href="javascript:void(0);">Something else here</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="description">
              <textarea id="tinymce" name="description">

              </textarea>
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

@extends('medecin.layouts.app')

@section('title', 'Ajout | ')

@push('css')

<link rel="stylesheet" href="{{ asset('backend/assets/plugins/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

@endpush

@section('content')

<section class="content">
  <div class="container-fluid">
    <form method="POST" action="{{ route('medecinOrdonnances.update', $ordonnance->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row clearfix">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="button-demo">
            <a href="{{ route('medecinOrdonnances.index') }}"  class="btn btn-warning m-t-15 waves-effect"><i class="material-icons">reply</i>Retour</a>
             <button type="submit" class="btn bg-teal m-t-15 waves-effect"><i class=" material-icons">save</i> Enregistrer</button>
      {{-- <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#formPelerin"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons large bold">add</i> Ajouter</font></font></button> --}}
      {{-- <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#exportationData"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class=" material-icons large bold">content_paste</i> EXPORTER</font></font></button>

      <button type="button" class="btn btn-info waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">INFO</font></font></button>
      <button type="button" class="btn btn-warning waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ATTENTION</font></font></button>
      <button type="button" class="btn btn-danger waves-effect"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DANGER</font></font></button> --}}
    </div>
          <div class="card">
            <div class="header bg-teal">
              <h2>
                Rédaction du rapport medical
              </h2>
              <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                  </a>
                  <ul class="dropdown-menu pull-right">

                    {{-- <li><a href="javascript:void(0);" data-toggle="modal" data-target="#formPelerin">Action</a></li> --}}
                    {{-- <li><a  type="submit"> <i class=" material-icons">save</i> Enregistrer</a></li> --}}
                    <li><a href="javascript:void(0);">Something else here</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <select class="form-control show-tick" id="pelerin" name="pelerin"  data-live-search="true" >
                <option disabled selected>Selectionnez le pelerin</option>
                                @foreach($ordonnance->agence->pelerins as $key=>$pelerin)
                                <option value="{{ $pelerin->id }}" {{$ordonnance->pelerin->id = $pelerin ? 'selected': ''}}>
                                 <span class="filter-option pull-left">{{ $pelerin->nom }} {{ $pelerin->prenom }} | <small class="text-muted bg-teal">{{ $pelerin->id_pelerin }}</small></span>
                             </option>
                             @endforeach
                         </select>
            <div class="description">
              <textarea id="tinymce" name="description" required>
                {{$ordonnance->description}}
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

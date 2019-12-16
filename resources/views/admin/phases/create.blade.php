@extends('multiauth::layouts.app')

@section('title', 'Ajout')

@push('css')



@endpush

@section('content')

<section class="content">
    <div class="container-fluid">

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-teal">
                        <h2>
                            Ajout d'une phase
                        </h2>
                    </div>
                    <div class="body">
                        <form method="POST" action="{{ route('admin.phases.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group form-float">
                                    <span class="input-group-addon">
                                      <i class="material-icons">mode_edit</i>
                                  </span>
                                  <div class="form-line">
                                      <input type="text"  class="form-control " placeholder="Nom" name="nom" required>
                                  </div>
                              </div><br>
                              <div class="form-line">
                                    <textarea name="description" id="description" cols="30" class=" form-control"></textarea>
                                </div>
                            <br>
                            <div class="switch m-t-10">
                                    {{-- <label><input type="checkbox" name="status"><span class="lever switch-col-teal" >statut</span></label> --}}
                                    <input type="checkbox" id="publication" class="filled-in" name="status" value="1">
                                    <label for="publication">Publier</label>
                                </div>
                            <br>
                            <a href="{{ route('admin.phases.index') }}"  class="btn bg-amber m-t-15 waves-effect"><i class=" material-icons">reply</i> Retour</a>
                            <button type="submit" class="btn bg-teal m-t-15 waves-effect"><i class=" material-icons">save</i> Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->

    </div>
</section>


@endsection

@push('scripts')


@endpush

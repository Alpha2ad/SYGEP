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
                <form method="POST" action="{{ route('admin.paiements.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="card">
                            <div class="header bg-teal card">
                                <span class="card-title">Les informations concernant le <strong>paiement</strong></span>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            {{-- <li> <a href="{{route('admin.bagages.create')}}" class="bg-green text-white"><i class="material-icons">add</i>De bagages</a></li> --}}
                                            <li> <a href="{{route('admin.paiements.index')}}" class="bg-teal text-white"><i class="material-icons">visibility</i>Liste des paiements</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                @include('multiauth::message')
                                <div class="input-group form-float">
                                        <span class="input-group-addon">
                                          <i class="material-icons">money</i>
                                      </span>
                                      <div class="form-line">
                                          <input type="double"  class="form-control " placeholder="montant" name="montant" required>
                                      </div>
                                  </div><br>
                                  <div class="form-line">
                                        <textarea rows="4" class="form-control no-resize" placeholder="Description..." name="description"></textarea>
                                    </div><br>
                                    <div class="form-line">
                                            <input type="file" id="image" placeholder="Image du pelerin" name="image" required>
                                      </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-teal card">
                                <h2>
                                    Toutes les agences
                                </h2>
                            </div>
                            <div class="body">
                                <label for="acount" class="form-label" >Selectionnez un acount</label>
                                <select class="form-control show-tick" id="acount" name="acount" data-live-search="true" required>
                                    <option disabled selected>Aucun element selectionner</option>
                                    @foreach($acounts as $key=>$acount)
                                    <option value="{{ $acount->id }}">{{ $acount->nom }}</option>
                                   @endforeach
                               </select>
                               <br> <br>
                                {{-- <label for="agence" class="form-label" >Selectionnez une agence</label>
                                <select class="form-control show-tick" id="agence" name="agence" data-live-search="true" >
                                    <option disabled selected>Aucun element selectionner</option>
                                    @foreach($agences as $key=>$agence)
                                    <option value="{{ $agence->id }}">{{ $agence->name }}</option>
                                   @endforeach
                               </select>
                               <br> <br> --}}
                               <label for="agent" class="form-label" >Selectionnez un agent</label>
                                <select class="form-control show-tick" id="agent" name="agent" required data-live-search="true" >
                                    <option disabled selected>Aucun element selectionner</option>
                                    @foreach($agents as $key=>$agent)
                                    <option value="{{ $agent->id }}" >{{ $agent->name }}</option>
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


@endpush

@extends('agence.layouts.app')
@section('title', 'Ajout')

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
                <form method="POST" action="{{ route('bagages.store') }}">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="header bg-teal">
                                <span class="card-title">Les informations concernant le <strong>Colis</strong></span>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            {{-- <li> <a href="{{route('admin.bagages.create')}}" class="bg-green text-white"><i class="material-icons">add</i>De bagages</a></li> --}}
                                            <li> <a href="{{route('bagages.index')}}" class="bg-cyan text-white"><i class="material-icons">visibility</i>Liste des bagages</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                @include('multiauth::message')
                                <div class="input-group form-float">
                                        {{-- <span class="input-group-addon">
                                          <i class="material-icons">person</i>
                                      </span> --}}
                                      <div class="form-line">
                                          <input type="double" min="0" class="form-control " placeholder="Quantité" name="poid_bagage" required>
                                      </div>
                                  </div>
                                  <div class="input-group">
                                        {{-- <span class="input-group-addon">
                                          <i class="material-icons">person</i>
                                      </span> --}}
                                      <div class="form-line">
                                          <input type="number" min="0" class="form-control " placeholder="Nombre de bagages" name="nombre_bagages" required>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="card">
                            <div class="header bg-teal">
                                <h2>
                                    Toutes les agences
                                </h2>
                            </div>
                            <div class="body">

                                <div class="row">
                                    <div class="col-md-6">
                                    <label for="role_id" class="form-label" >Pelerin</label>
                                <select class="form-control show-tick" id="pelerin" name="pelerin" multiple data-live-search="true" >
                                    @foreach($pelerins as $key=>$pelerin)
                                    <option value="{{ $pelerin->id }}">
                                       <span class="filter-option pull-left">{{ $pelerin->nom }} {{ $pelerin->prenom }} | <small class="text-muted bg-teal">{{ $pelerin->id_pelerin }}</small></span>
                                   </option>
                                   @endforeach
                               </select>
                                    </div>
                                     <div class="col-md-6">
                                    <label for="role_id" class="form-label" >Phase</label>
                                <select class="form-control show-tick" id="phase" name="phase" data-live-search="true" >
                                    @foreach($phases as $key=>$phase)
                                    <option value="{{ $phase->id }}">
                                       <span class="filter-option pull-left">{{ $phase->nom }} </span>
                                   </option>
                                   @endforeach
                               </select>
                                    </div>
                                </div>

                               <br>
                               <br>
                               <div class="form-line">
                                <textarea rows="4" class="form-control no-resize" placeholder="Description..." name="description"></textarea>
                            </div>
                            {{-- <div class="switch m-t-10">
                                <label><input type="checkbox" name="status"><span class="lever switch-col-teal" >statut</span></label>
                                <input type="checkbox" id="publication" class="filled-in" name="status" value="1">
                                <label for="publication">Publier</label>
                            </div> --}}
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

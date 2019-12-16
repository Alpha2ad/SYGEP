@extends('agence.layouts.app')

@section('content')
{{-- <div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif You are logged in to {{ config('multiauth.prefix') }} side!
            </div>
        </div>
    </div>
</div>
</div> --}}
<section class="content">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header bg-teal">
        <h2>
            <strong>{{$pelerin->prenom}}  {{$pelerin->nom}}</strong>
            <span class="badge bg-white">{{$pelerin->id_pelerin}} </span>
          <small>Categorie: {{$pelerin->type}}</small>
          <small>Numero Passeport: {{$pelerin->num_passeport}} </small>
        </h2>
        <ul class="header-dropdown m-r--5">
          <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">more_vert</i>
            </a>
            <ul class="dropdown-menu pull-right">
              <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
              <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
              <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
          {{-- <li role="presentation" class=""><a href="#home" data-toggle="tab" aria-expanded="false">HOME</a></li> --}}
          <li role="presentation" class="active"><a href="#profile" data-toggle="tab" aria-expanded="true">Informations</a></li>
          <li role="presentation" class=""><a href="#messages" data-toggle="tab" aria-expanded="false">MESSAGES</a></li>
          <li role="presentation" class=""><a href="#settings" data-toggle="tab" aria-expanded="false">MODIFICATION</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade-in active" id="profile">

            <div class="row">
              <div class="col-sm-3">
                <img src="{{asset('storage/'.$pelerin->image)}} " alt="admin_profile_image" class="thumbnail img-responsive img-fluid img-rounded">
              </div>
              <div class="col-sm-9">
                <ul class="list-group">
                  <li class="list-group-item"> <strong>{{$pelerin->prenom}}  {{$pelerin->nom}}</strong><span class="badge bg-teal">{{$pelerin->id_pelerin}} </span></li>
                  <li class="list-group-item"> Passeport:  {{$pelerin->num_passeport}} <span class="badge bg-cyan"></span></li>
                  {{-- <li class="list-group-item"> Agence:  {{$pelerin->agence->name}} <span class="badge bg-teal"></span></li> --}}
                  {{-- <li class="list-group-item"> Bagages:  {{$pelerin->bagages->nombre_bagages}} <span class="badge bg-teal"></span></li> --}}
                  <li class="list-group-item"><strong>Etat de Santé</strong> <span class="badge bg-green">OK</span></li>
                  <li class="list-group-item"><strong>Etat de Paiment</strong> <span class="badge bg-teal">{{$pelerin->acount->paiements->sum('montant')}} GNF</span></li>
                </ul>

              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="messages">
            <b>Message Content</b>
            <p>
              Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
              Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
              pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
              sadipscing mel.
            </p>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="settings">
            <div class="body">
              <form method="POST" action="{{ route('pelerins.update', $pelerin->id) }} " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="">
                      {{-- <div class="header bg-teal">
                        <h2>
                         Les informations du pelerin
                       </h2>
                     </div> --}}
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
                          <label for="agence" class="form-label" >Agences</label>
                          <select class="form-control show-tick" id="agence" name="agence "  data-live-search="true" >
                            {{-- @foreach($pelerin->agence as $key=>$agence)
                            <option value="{{ $agence->id }}">{{ $agence->name }}</option>
                            @endforeach --}}
                          </select>

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
                          <input type="file" id="image" placeholder="Image de l'aricle" name="image" >
                        </div>
                        <a href=""  class="btn btn-warning m-t-15 waves-effect"><i class="material-icons">reply</i>RETOUR</a>
                        <button type="submit" class="btn bg-teal m-t-15 waves-effect"><i class="material-icons">update</i> MODIFIER</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection


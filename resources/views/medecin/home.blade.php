@extends('medecin.layouts.app')

@section('content')
<section class="content">
            <div class="container-fluid">
                <div class="card " >
      <div class="header bg-teal">
        <strong class="">TABLEAU DE BORD </strong>
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

                <!-- Widgets -->
                {{-- <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">playlist_add_check</i>
                            </div>
                            <div class="content">
                                <div class="text">ARTICLE TOTAL</div>
                                <div class="number count-to" data-from="0" data-to="{{ $posts->count() }}" data-speed="15" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-cyan hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">favorite</i>
                            </div>
                            <div class="content">
                                <div class="text">TOTAL ARTICLE FAVORIS</div>
                                <div class="number count-to" data-from="0" data-to="{{ Auth::user()->favorite_posts()->count() }}" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-red hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">library_books</i>
                            </div>
                            <div class="content">
                                <div class="text">TOTAL ARTICLE SUSPENDU</div>
                                <div class="number count-to" data-from="0" data-to="{{ $Total_posts_suspendu }}" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-orange hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">visibility</i>
                            </div>
                            <div class="content">
                                <div class="text">TOTAL VUS</div>
                                <div class="number count-to" data-from="0" data-to="{{ $Total_vus_posts }}" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- #END# Widgets -->
                <!-- Widgets -->
                {{-- <div class="row clearfix">

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-pink hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">apps</i>
                            </div>
                            <div class="content">
                                <div class="text">CATEGORIES TOTAL</div>
                                <div class="number count-to" data-from="0" data-to="{{ $Total_categories }}" data-speed="15" data-fresh-interval="20"></div>
                            </div>
                        </div>
                        <div class="info-box bg-amber hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">tags</i>
                            </div>
                            <div class="content">
                                <div class="text">TAGS TOTAL</div>
                                <div class="number count-to" data-from="0" data-to="{{ $Total_tag }}" data-speed="15" data-fresh-interval="20"></div>
                            </div>
                        </div>
                        <div class="info-box bg-purple hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">account_circle</i>
                            </div>
                            <div class="content">
                                <div class="text">
                                AUTEUR TOTAL</div>
                                <div class="number count-to" data-from="0" data-to="{{ $Total_auteurs }}" data-speed="15" data-fresh-interval="20"></div>
                            </div>
                        </div>
                        <div class="info-box bg-deep-purple hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">fiber_new</i>
                            </div>
                            <div class="content">
                                <div class="text">AUTEUR DU JOUR TOTAL</div>
                                <div class="number count-to" data-from="0" data-to="{{ $nouvel_auteur_du_Jour }}" data-speed="15" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <div class="row clearfix">
                                    <div class="col-xs-12 col-sm-6">
                                        <h2>CPU USAGE (%)</h2>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 align-right">
                                        <div class="switch panel-switch-btn">
                                            <span class="m-r-10 font-12">REAL TIME</span>
                                            <label>OFF<input type="checkbox" id="realtime" checked><span class="lever switch-col-cyan"></span>ON</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <div id="real_time_chart" class="dashboard-flot-chart"></div>
                            </div>
                        </div>
                    </div>

                </div> --}}
                <!-- #END# Widgets -->



                <div class="row clearfix">
                    <!-- Task Info -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="header bg-teal">
                                <h2>TOP 10 DES AUTEURS LES PLUS ACTIF</h2>
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
                                <th>N° Passeport</th>
                                <th>Identifiant</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Statut</th>
                                <th>Date de naissance</th>
                              </tr>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>N°</th>
                              <th>Nom</th>
                              <th>Prenom</th>
                              <th>N° Passeport</th>
                              <th>Identifiant</th>
                              <th>Telephone</th>
                              <th>Email</th>
                              <th>Statut</th>
                              <th>Date de naissance</th>
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

                         </tr>

                         @endforeach

                       </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="header bg-teal">
                                <h2>TOP 10 DES AUTEURS LES PLUS ACTIF</h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_teal">
                                        <thead>
                                            <tr>
                                                <th>Ordre</th>
                                                <th>Nom</th>
                                                <th>Articles</th>
                                                <th>Commentaires</th>
                                                <th>Favoris</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Ordre</th>
                                                <th>Nom</th>
                                                <th>Articles</th>
                                                <th>Commentaires</th>
                                                <th>Favoris</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            {{-- @foreach($auteur_actif as $key=>$auteur)
                                              <tr>
                                                  <td>{{ $key + 1 }}</td>
                                                  <td>{{ $auteur->name }}</td>
                                                  <td>{{ $auteur->posts_count }}</td>
                                                  <td>{{ $auteur->comments_count }}</td>
                                                  <td>{{ $auteur->favorite_posts_count }}</td>
                                              </tr>
                                            @endforeach --}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Task teal -->
                </div>
                <div class="row clearfix">
                    <!-- Task teal -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="header bg-teal">
                                <h2>LES ARTICLES LES PLUS POPULAIRES</h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_teal">
                                        <thead>
                            <tr>

                              <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>N° Passeport</th>
                                <th>Identifiant</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Statut</th>
                                <th>Date de naissance</th>
                              </tr>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>N°</th>
                              <th>Nom</th>
                              <th>Prenom</th>
                              <th>N° Passeport</th>
                              <th>Identifiant</th>
                              <th>Telephone</th>
                              <th>Email</th>
                              <th>Statut</th>
                              <th>Date de naissance</th>
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

                         </tr>

                         @endforeach

                       </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Task Info -->
                </div>
            </div>
        </section>
@endsection

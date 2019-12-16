@extends('multiauth::layouts.app')
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
            <div class="container-fluid">
                <div class="block-header">
                    <h2><b>TABLEAU DE BOARD</b></h2>
                </div>
                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">playlist_add_check</i>
                            </div>
                            <div class="content">
                                <div class="text">ARTICLE TOTAL</div>
                                <div class="number count-to" data-from="0" data-to="{{-- {{ $posts->count() }} --}}" data-speed="15" data-fresh-interval="20"></div>
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
                                <div class="number count-to" data-from="0" data-to="{{-- {{ Auth::user()->favorite_posts()->count() }} --}}" data-speed="1000" data-fresh-interval="20"></div>
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
                                <div class="number count-to" data-from="0" data-to="{{-- {{ $Total_posts_suspendu }} --}}" data-speed="1000" data-fresh-interval="20"></div>
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
                                <div class="number count-to" data-from="0" data-to="{{-- {{ $Total_vus_posts }} --}}" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Widgets -->
                <!-- Widgets -->
                <div class="row clearfix">

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-pink hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">apps</i>
                            </div>
                            <div class="content">
                                <div class="text">CATEGORIES TOTAL</div>
                                <div class="number count-to" data-from="0" data-to="{{-- {{ $Total_categories }} --}}" data-speed="15" data-fresh-interval="20"></div>
                            </div>
                        </div>
                        <div class="info-box bg-amber hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">tags</i>
                            </div>
                            <div class="content">
                                <div class="text">TAGS TOTAL</div>
                                <div class="number count-to" data-from="0" data-to="{{-- {{ $Total_tag }} --}}" data-speed="15" data-fresh-interval="20"></div>
                            </div>
                        </div>
                        <div class="info-box bg-purple hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">account_circle</i>
                            </div>
                            <div class="content">
                                <div class="text">
                                AUTEUR TOTAL</div>
                                <div class="number count-to" data-from="0" data-to="{{-- {{ $Total_auteurs }} --}}" data-speed="15" data-fresh-interval="20"></div>
                            </div>
                        </div>
                        <div class="info-box bg-deep-purple hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">fiber_new</i>
                            </div>
                            <div class="content">
                                <div class="text">AUTEUR DU JOUR TOTAL</div>
                                <div class="number count-to" data-from="0" data-to="{{-- {{ $nouvel_auteur_du_Jour }} --}}" data-speed="15" data-fresh-interval="20"></div>
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

                </div>
                <!-- #END# Widgets -->


                <div class="row clearfix">
                    <!-- Task Info -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="header bg-teal">
                                <h2>LES ARTICLES LES PLUS POPULAIRES</h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover dashboard-task-infos">
                                        <thead>
                                            <tr>
                                                <th>Ordre</th>
                                                <th>Titre</th>
                                                <th>Auteur</th>
                                                <th>Vus</th>
                                                <th>Favoris</th>
                                                <th>Commentaires</th>
                                                <th>Statut</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach($posts_populaire as $key=>$post)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ str_limit($post->title,'20') }}</td>
                                                    <td>{{ $post->user->name }}</td>
                                                    <td>{{ $post->view_count }}</td>
                                                    <td>{{ $post->favorite_to_users_count }}</td>
                                                    <td>{{ $post->comments_count }}</td>
                                                    <td>
                                                        @if($post->is_approved == true)
                                                        <span class="label bg-green">Publié</span>
                                                        @else
                                                        <span class="label bg-red">Non Publié</span>
                                                        @endif
                                                    </td>
                                                    <td> <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="{{ route('admin.post.show', $post->id) }}" ><i class="material-icons">visibility</i>Detail</a></li>
                                            <li><a href="{{ route('admin.post.edit', $post->id) }}" ><i class="material-icons">edit</i>Modification</a></li>

                                            <li>
                                               <form method="POST" id="delete-form-{{ $post->id }} " action="{{ route('admin.post.destroy', $post->id) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Est-vous sur de vouloir supprimé cette Catégorie???') ){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $post->id }} ').submit();
                                            }else{
                                                event.preventDefault();
                                            } "><i class="material-icons" rel="tooltip" title="supression">delete</i>Suprimer</button>
                                        </li>

                                    </ul>
                                                </tr>
                                            @endforeach --}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Task Info -->
                </div>
                <div class="row clearfix">
                    <!-- Task Info -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="header bg-teal">
                                <h2>TOP 10 DES AUTEURS LES PLUS ACTIF</h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover dashboard-task-infos">
                                        <thead>
                                            <tr>
                                                <th>Ordre</th>
                                                <th>Nom</th>
                                                <th>Articles</th>
                                                <th>Commentaires</th>
                                                <th>Favoris</th>
                                            </tr>
                                        </thead>
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
                    <!-- #END# Task Info -->
                </div>
            </div>
        </section>
@endsection

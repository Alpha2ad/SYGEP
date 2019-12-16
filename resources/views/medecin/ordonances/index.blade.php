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
                            <div class="row clearfix">
                                <!-- Task teal -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="header bg-teal">
                                            <h2>LISTES DES ORDONNANCES MEDICALE</h2>
                                        </div>
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_teal">
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
                                                    <tfoot>
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
                                                    </tfoot>
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
                        </div>
                    </section>
            @endsection

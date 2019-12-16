@extends('multiauth::layouts.app')

@section('title', 'Modification')

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
                            Modification de la phase
                        </h2>
                    </div>
                    <div class="body">
                        <form method="POST" action="{{ route('admin.phases.update',$category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="nom">Nom</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="nom" class="form-control" placeholder="Tag" name="name" value="{{ $category->name }}">
                                </div>
                            </div>

                            <label for="nom">image</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="image" placeholder="image" name="image" value="{{ $category->image }}">
                                </div>
                            </div>
                            <br>
                            <a href="{{ route('admin.phases.index') }}"  class="btn btn-danger m-t-15 waves-effect">Retour</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Modifier</button>
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

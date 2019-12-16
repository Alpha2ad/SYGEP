@extends('agence.layouts.app')

@section('title')
{{ $paiement->name }}
@endsection

@push('css')


@endpush

@section('content')

<section class="content">
  <div class="container-fluid">
    {{-- <div class="card " >
      <div class="header bg-teal">
        <strong class="">Page de Visualisation d'Article </strong>
      </div>
    </div> --}}
    <div class="block-header">

     <a href="{{ route('paiements.index') }}  " class="btn btn-warning waves-effect"> <i class="material-icons" rel="tooltip" title="Retour a la liste de paiements">reply</i> Retour</a>
   </div>
   <div class="row clearfix">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="card">
        <div class="header bg-teal">
          <h2>
            {{ $paiement->name }}
            <small class=" bold">Montant: {{$paiement->montant}} GNF</small>
            {{-- <small>Posté par: <strong><a href="" class="text-uppercase"></a>{{ $post->agence->name }}   </strong> Date: {{ $post->created_at->toDateString() }} </small> --}}
          </h2>
          <ul class="header-dropdown m-r--5">
            <li class="dropdown">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">more_vert</i>
              </a>
              <ul class="dropdown-menu pull-right">
                <li><a href="javascript:void(0);">
                  @if($paiement->status == false)

                  <a href="javascript:void(0);" class="btn bg-green  waves-effect pull-right btn-sm" onclick="if(confirm('Est-vous sur de vouloir approuvé cet Article ???') ){
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                  }else{
                    event.preventDefault();
                  } "><i class="material-icons" rel="tooltip" title="Approvation">done_all</i><span>Approuvé</span></a>

                  {{-- <form method="POST" action="{{ route('agence.post.approuve' ,$post->id) }}"
                   id="approval-form" style="display: none;">
                   @csrf
                   @method('PUT')
                 </form> --}}
                 @else

                 <button type="button" class="btn btn-danger  waves-effect pull-right " onclick="if(confirm('Est-vous sur de vouloir Suspendre cet Article ???') ){
                  event.preventDefault();
                  document.getElementById('approval-form').submit();
                }else{
                  event.preventDefault();
                } "><i class="material-icons" rel="tooltip" title="supression">help</i><span>Suspendre</span></button>

                {{-- <form method="POST" action="{{ route('agence.post.approuve' ,$post->id) }}"
                   id="approval-form" style="display: none;">
                   @csrf
                   @method('PUT')
                 </form> --}}

                @endif
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="body">
            {{-- <h5>Image de la Facture</h5> --}}
        <img class="img-responsive thumbnail zoomIn materialboxed" src="{{asset('storage/'.$paiement->image)}}" alt="{{ $paiement->name }} ">
   </div>
 </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
  <div class="card">
    <div class="header bg-teal">
      <h2>
        Agence
      </h2>
    </div>
    <div class="body">
      <span class="label bg-teal">{{ $paiement->acount->pelerin->agence->name }}</span>
    </div>
  </div>
  @if ($paiement->acount->pelerin->agent)
  <div class="card">
    <div class="header bg-teal">
      <h2>
       Agent
     </h2>
   </div>
   <div class="body">
    <span class="label bg-teal">{{$paiement->acount->pelerin->agent->name}}</span>
  </div>
</div>
@endif
<div class="card">
  <div class="header bg-teal">
    <h2>
        Description
   </h2>
 </div>
 <div class="body">

    {!! html_entity_decode($paiement->description) !!}
</div>
</div>
</div>
<!-- #END# Vertical Layout -->

</div>
</section>


@endsection

@push('scripts')


@endpush

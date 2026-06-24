
@extends('layouts.admin.base',['page_title'=>'article|detail'])
    @section('content')
    <div class=" flex flex-col rounded rounded-2xl border-gray-400 shadow-xl p-8 ">
    <h1 class="text-2xl">Article</h1>
    <div class="flex "><h3>ID : {{$article->id}}</h3> </div>
    <div><h3>Label : {{$article->label}}</h3> </div>
    <div><h3>Qantite : {{$article->quantite}}</h3> </div>
    <div><h3>Prix Unitaire : {{$article->current_price}}</h3> </div>
    <div><h3>Description : {{$article->description}}</h3> </div>
    <div><h3>Est Active : {{$article->is_active}}</h3> </div>
    <div><h3>Categorie :  @isset($article->categorie->label)
{{$article->categorie->label}}
    @endisset</h3></div>
    {{-- <a href="{{ route('articles.index')}}"><button> Retour</button></a> --}}
    </div>

@endsection


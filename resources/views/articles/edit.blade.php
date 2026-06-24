@extends('layouts.admin.base',['page_title'=>'article|edit'])
@section('content')
<div class="border border-gray-400 rounded rounded-3xl p-6">
        <div class="flex space-x-5">
        <span class=" text-blue-500">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
</svg>
        </span>

        <h1 class="text-2xl py-3">Edit Article</h1>
    </div>


    <form action="{{route('admin.articles.update',$article->id)}}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method("PUT")
        <div>
            <label for="libele">Libele</label>
          <input type="text" name="label" id="libele" class="border border-gray-400 rounded rounded-1xl"  value="{{old("label" ,$article->label)}}">
        </div>

        <div>
            <label for="quantite"> Quantite</label>
        <input type="number" class="border border-gray-400 rounded rounded-1xl" name="quantite" id="quantite" value="{{old("quantite",$article->quantite)}}">
        </div>

        <div>
             <label for="prix">Prix unitaire</label>
        <input type="number" class="border border-gray-400 rounded rounded-1xl " name="prix" id="prix" value="{{old("current_price",$article->current_price)}}">
        </div>

        <div class=" flex flex-col">
            <label for="description">Description</label>
        <textarea name="description" id="description" cols="30"  class="border border-gray-400 rounded rounded-1xl " rows="5">{{old("description" ,$article->description)}}</textarea>
        </div>
              <div>
                    <label for="cover_fild">Image</label>
                    <input type="file" name="cover_fild" id="cover_fild"
                        class="border border-gray-400 rounded rounded-1xl">
                </div>
        <div>
            <label for="categorie"> Categorie</label>
        <select class="border border-gray-400 rounded rounded-1xl " name="categorie" id="categorie">
           @forelse ($categories as $categorie)
               <option value="{{ $categorie->id }}" @selected(old('categorie', $article->categorie_id) == $categorie->id) >
                           {{ $categorie->label }}
               </option>
           @empty
                <option value="" >Aucune categorie</option>
           @endforelse

        </select>
        </div>
        <div>
            <button class="primary-button" type="submit">Enregistrer</button>
        </div>

    </form>

</div>

@endsection

@extends('layouts.admin.base',['page_title'=>"articles|create"])
@section('content')
    <div class="border border-gray-400 rounded rounded-3xl p-6 space-y-6">

        <div class="flex space-x-3">
            <span class="text-blue-500 text-6xl">+</span>
            <h1 class="text-2xl py-4">New article</h1>
        </div>
        <div>
            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf


                <div>
                    <label for="libele">Libele</label>
                    <input type="text" name="label" id="libele" type="number"
                        class="border border-gray-400 rounded rounded-1xl">
                </div>

                <div>
                    <label for="quantite"> Quantite</label>
                    <input type="number" name="quantite" id="quantite" type="number"
                        class="border border-gray-400 rounded rounded-1xl">
                </div>

                <div>
                    <label for="prix">Prix unitaire</label>
                    <input type="number" name="current_price" id="prix" type="number"
                        class="border border-gray-400 rounded rounded-1xl">
                </div>

                <div class="flex flex-col">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="5" type="number"
                        class="border border-gray-400 rounded rounded-1xl"></textarea>
                </div>
                <div>
                    <label for="cover_fild">Image</label>
                    <input type="file" name="cover_fild" id="cover_fild"
                        class="border border-gray-400 rounded rounded-1xl">
                </div>
                <div>
                    <label for="categorie"> Categorie</label>
                    <select name="categorie_id" id="categorie" type="number"
                        class="border border-gray-400 rounded rounded-1xl">
                        @forelse ($categories as $categorie)
                            <option value={{ $categorie->id }}>{{ $categorie->label }}</option>
                        @empty
                            <option value=null>Aucune categorie</option>
                        @endforelse

                    </select>
                </div>
                <button type="submit" class="primary-button">Enregistrer</button>
            </form>

        </div>


    </div>
@endsection

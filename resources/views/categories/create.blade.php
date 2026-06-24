@extends('layouts.admin.base',['page_title'=>'categorie|create'])
@section('content')
<div class="flex-col border  border-gray-400 rounded rounded-lg p-6">
       <div class="flex space-x-5">
              <span class="text-blue-500 text-5xl">+</span>
              <h1 class="py-3 text-2xl"> New Categorie</h1>
       </div>

    <form action="{{ route('admin.categories.store') }}" method="POST" class=" flex-col">
        @csrf
        <div>
               <label for="libele">Libele</label><br>
        <input type="text" name="label" id="libele" class="border border-gary-300 hover:bg-gray-200  rounded rounded-sm" ><br>

        </div>

        @error('label')
               <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div>
              <label for="description"> Description</label><br>
        <textarea name="description" id="description" cols="30" rows="5"  class="border border-gary-300 hover:bg-gray-200   rounded rounded-sm"></textarea><br>

        </div>

        @error('description')
               <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="primary-button"> Enregistrer</button>
    </form>

</div>

@endsection


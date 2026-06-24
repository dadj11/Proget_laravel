@extends('layouts.admin.base',['page_title'=>'categorie|edit'])
@section('content')
<div class="flex-col space-y-3 border border-gray-400 rounded rounded-lg p-6">
    <div class="flex space-x-5">
        <span class=" text-blue-500">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
</svg>
        </span>

        <h1 class="text-2xl py-3">Edit Categorie</h1>
    </div>

    <form action="{{route('admin.categories.update',$category->id)}}" method="POST" class=" flex-col space-y-3 ">
        @method("PUT")
        @csrf
        <div class="flex  flex-col space-y-2 ">
            <label for="libele">Libele</label>
        <input type="text" name="label" id="libele"  class="border border-gary-300 hover:bg-gray-200  rounded rounded-sm"  value="{{old('label',$category->label)}}">

        </div>

        @error('label')
               <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class=" flex flex-col space-y-2">
            <label for="description"> Description</label>
        <textarea name="description" id="description" cols="30" rows="5" class="border border-gary-300 hover:bg-gray-200  rounded rounded-sm"  >
            {{old('description',$category->description)}}</textarea>
        </div>

        @error('description')
               <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="flex space-x-6">
           <button type="submit" class="flex gap-2 px-2 py-1  hover:bg-blue-400 hover:cursor-pointer w-1/2 rounded rounded-lg sm:bg-blue-500"> Enregistrer</button>
           <a href="{{route('admin.categories.index')}}"><button  class="flex gap-2 px-2 py-1  hover:bg-gray-200 hover:cursor-pointer w-full rounded rounded-lg sm:bg-gray-300"> Anuller</button></a>
        </div>

    </form>

</div>


@endsection


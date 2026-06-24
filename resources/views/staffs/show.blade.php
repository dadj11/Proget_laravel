@extends('layouts.admin.base',['page_title'=>'staff|detail'])
@section('content')
    <div class=" shadow-2xl rounded rounded-xl space-y-6 p-6">
        <div>
            <h1 class="text-2xl">staff {{ $staff->id }} </h1>
        </div>
        <div>
            <h3> <span class="text-xl">Nom : </span>{{ $staff->user->lastname }}</h3>
            <h3> <span class="text-xl">Prenom : </span>{{ $staff->user->firstname }}</h3>
            <h3> <span class="text-xl">Email : </span>{{ $staff->user->email }}</h3>
            <h3> <span class="text-xl">Sexe : </span>{{ $staff->user->gender }}</h3>
            <h3> <span class="text-xl">birth_day : </span>{{ $staff->user->birth_day }}</h3>
            <h3> <span class="text-xl">Email de verification : </span>{{ $staff->user->email_verified }}</h3>
            <h3></h3>
        </div>


    </div>
@endsection

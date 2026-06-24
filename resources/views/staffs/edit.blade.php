@extends('layouts.admin.base',['page_title'=>'staff|edit'])
@section('content')
    <div class=" shadow-2xl rounded rounded-xl space-y-6 p-6">
        <div class="flex space-x-5">
            <span class=" text-blue-500">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
</svg>
        </span>
            <h1 class="text-2xl py-2">Nouveau employer </h1>
        </div>
        <div>
            <form action="{{ route('admin.staffs.update', $staff->id) }}" method="POST" class="space-y-5">
                @method('PUT')
                @csrf
                <div>
                    <label for="lastname">Lastname :</label>
                    <input class="border bouder-gray-400 rounded rounded-sm" type="text" name="lastname" id="lastname"
                        value="{{ old('lastname', $staff->user->lastname) }}">
                </div>
                <div>
                    <label for="firstname">Firstname :</label>
                    <input class="border bouder-gray-400 rounded rounded-sm" type="text" name="firstname" id="firstname"
                        value="{{ old('firstname', $staff->user->firstname) }}">
                </div>
                <div>
                    <label for="email"> Email :</label>
                    <input class="border bouder-gray-400 rounded rounded-sm" type="email" name="email" id="email"
                        value="{{ old('email', $staff->user->email) }}">
                </div>

                <div>
                    <label for="sexe"> Sexe :</label>
                    <select class="border bouder-gray-400 rounded rounded-sm" name="sexe" id="sexe"
                        value="{{ old('sexe', $staff->user->gender) }}">
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>
                <div>
                    <label for="phone">Phone :</label>
                    <input class="border bouder-gray-400 rounded rounded-sm" type="number" name="phone" id="phone"
                        value="{{ old('phone', $staff->user->phone) }}">
                </div>
                <div>
                    <label for="birth_day">Birth day :</label>
                    <input class="border bouder-gray-400 rounded rounded-sm" type="date" name="birth_day" id="birth_day"
                        value="{{ old('birth_day', $staff->user->birth_day) }}">
                </div>
                <div>
                    <button class="primary-button">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.admin.base',['page_title'=>'staff|create'])
@section('content')
    <div class="shadow-2xl rounded-xl space-y-6 p-6">
        <div class="flex space-x-5">
            <span class="text-blue-500 text-6xl">+</span>
            <h1 class="text-2xl py-4">Nouveau membre du personnel</h1>
        </div>
        <div>
            <form action="{{ route('admin.staffs.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="lastname">Nom :</label>
                    <input class="border border-gray-400 rounded-sm @error('lastname') border-red-500 @enderror" type="text" name="lastname" id="lastname" value="{{ old('lastname') }}">
                    @error('lastname') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="firstname">Prénom :</label>
                    <input class="border border-gray-400 rounded-sm @error('firstname') border-red-500 @enderror" type="text" name="firstname" id="firstname" value="{{ old('firstname') }}">
                    @error('firstname') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email">Email :</label>
                    <input class="border border-gray-400 rounded-sm @error('email') border-red-500 @enderror" type="email" name="email" id="email" value="{{ old('email') }}">
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password">Mot de passe :</label>
                    <input class="border border-gray-400 rounded-sm @error('password') border-red-500 @enderror" type="password" name="password" id="password">
                    @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password_confirmation">Confirmer le mot de passe :</label>
                    <input class="border border-gray-400 rounded-sm" type="password" name="password_confirmation" id="password_confirmation">
                </div>

                <div>
                    <label for="sexe">Sexe :</label>
                    <select class="border border-gray-400 rounded-sm" name="sexe" id="sexe">
                        <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>M</option>
                        <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>F</option>
                    </select>
                    @error('sexe') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="phone">Téléphone :</label>
                    <input class="border border-gray-400 rounded-sm @error('phone') border-red-500 @enderror" type="text" name="phone" id="phone" value="{{ old('phone') }}">
                    @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="birth_day">Date de naissance :</label>
                    <input class="border border-gray-400 rounded-sm @error('birth_day') border-red-500 @enderror" type="date" name="birth_day" id="birth_day" value="{{ old('birth_day') }}">
                    @error('birth_day') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="role">Rôle :</label>
                    <select class="border border-gray-400 rounded-sm" name="role" id="role">
                        <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                        <option value="delivery_person" {{ old('role') == 'delivery_person' ? 'selected' : '' }}>Livreur</option>
                    </select>
                    @error('role') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <button type="submit" class="primary-button">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.admin.base',['page_title'=>'commande | list'])
@section('content')
    <div class="space-y-5">
        <div>
            <h1 class="text-2xl">Commandes </h1>
        </div>
        <div class="  border border-gray-300 px-6 py-8 ">
            <table class="w-full">
                <thead>
                    <tr class=" flex-col border-b border-gray-400 ">
                        <th class="text-left  text-sm px-3 py-2 ">ID</th>
                        <th class="text-left  text-sm px-3 py-2 ">Client</th>
                        <th class="text-left  text-sm px-3 py-2 "> Date</th>
                        <th class="text-left  text-sm px-3 py-2 ">Montant</th>
                        <th class="text-left  text-sm px-3 py-2 ">Statutd de Livraison</th>
                        <th class="text-left  text-sm px-3 py-2 "> Acrtion</th>
                    </tr>

                </thead>
                <tbody>
                    @forelse ($all as $one)
                        <tr class=" flex-col border-t border-gray-400 hover:bg-gray-200 space-y-5 py-3">
                            <td class="px-4 py-3"> {{ $one->id }}</td>
                            <td class="px-4 py-3">{{ $one->client_id }}</td>
                            <td class="px-4 py-3">{{ $one->date }}</td>
                            <td class="px-4 py-3">{{ $one->amount }}</td>
                            <td class="px-4 py-3">{{ $one->delivery_status }}</td>
                            <td class="px-4 py-3 flex  space-x-2">
                                @if ($one->delivery_status == 'PENDING')
                                    <form action="/admin/orders/{{ $one->id }}/reject" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="bg-red-400 hover:bg-red-600 rounded rounded-sm text-white px-2"
                                            type="submit">REJECT</button>
                                    </form>
                                    <form action="/admin/orders/{{ $one->id }}/start-livraison" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="bg-blue-400 hover:bg-blue-600 rounded rounded-sm text-white px-2"
                                            type="submit">START</button>
                                    </form>
                                @endif
                                @if ($one->delivery_status == 'START')
                                    <form action="/admin/orders/{{ $one->id }}/confirm-livraison" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class=" bg-green-400 hover:bg-green-600 rounded rounded-sm text-white px-2"
                                            type="submit">CONFIRM</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection

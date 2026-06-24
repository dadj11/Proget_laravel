<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/carte.js')
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>

<body>
    <div class="p-12 flex-col space-y-6">
        <div>
            <h1 class="text-3xl">ARTICLES</h1>
        </div>
        <div>
            <div class=" grid grid-cols-1 grid sm:grid-cols-4 gap-4">
                @forelse ($articles as $article)

                        <div class="border border-gray-300 flex flex-col space-y-4 rounded-sm shadow-2xl">
                            <div class="h-42  bg-cover bg-center p-4 ">
                                <img class="h-45 w-full bg-cover bg-center"
                                    src="{{ asset('storage/' . $article->cover) }}" alt="">
                            </div>
                            <div class="p-4 flex space-x-7">
                                <div>
                                  <h2>{{ $article->label }}</h2>
                                  <h2>{{ $article->current_price }} FCFA</h2>
                                </div>

                                <button class="px-2 bg-gray-300 rounded rounded-xl add-to-carde" id={{$article->id}} >Acheter</button>
                            </div>
                        </div>

                @empty
                @endforelse

            </div>

        </div>

    </div>


</body>

</html>

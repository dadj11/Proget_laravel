  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     @vite('resources/js/app.js')
     @vite('resources/css/app.css')
     {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>
<body>
     <div class="  h-screen  flex  ">
     <div class="hidden xl:block bg-cover bg-red-500 bg-[url('http://127.0.0.1:8000/col.jpg')]  h-full  w-1/2" ></div>
     <div class="w-full xl:w-1/2 flex items-center justify-center">
        <form action="{{ route('auth.login') }}" method="post"   class="space-y-3  shadow-xl  rounded rounded-lg p-6">
            @csrf
            <h1 class="text-4xl text-center font-medium">Login</h1>
            <div class="flex flex-col"><label for="email">Email</label>
                <input class="border border-gray-200 px-2 py-1 rounded rounded-lg" type="email"
                placeholder="godwindadja@gmail.com" id="email" name="email">
            </div>
            <div class="flex flex-col"><label for="password">password</label>
                <input  class="border border-gray-200 px-2 py-1 rounded rounded-lg" type="password"
                placeholder="......" id="password" name="password">
            </div>
            <div>
                <button  class=" px-2 py-1 bg-green-600 hover:green-300 w-full rounded rounded-lg sm:bg-blue-600 text-white" type="submit">login</button>

            </div>
       </form></div>
     </div>

</body>
</html>

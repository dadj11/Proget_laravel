 <nav class="navbar bg-base-100 shadow-sm ">
     <div class="flex-1">
         <a class="btn btn-ghost text-xl" href="{{ route('home') }}">E-commerce </a>
     </div>

     <div class="flex-none gap-2">
         <label for="my-drawer-4" class="btn btn-ghost btn-circle">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-5 h-5">
                 <path stroke-linecap="round" stroke-linejoin="round"
                     d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
             </svg>
         </label>

         <div class="dropdown dropdown-end">
             <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                 <div class="w-10 rounded-full">
                     <img alt="Profile"
                         src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                 </div>
             </div>
             <ul tabindex="0"
                 class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                 <li><a class="justify-between">Profile <span class="badge">New</span></a></li>
                 <li><a>Settings</a></li>
                 <form action="{{ route('auth.logout') }}" method="POST">
                     @csrf
                     <li><button type="submit">Logout</button></li>
                 </form>

             </ul>
         </div>
     </div>
 </nav>

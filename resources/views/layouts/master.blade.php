<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Occupational::@yield('title') </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body>
    @include('includes.top-nav')
    <div class="pt-12 lg:flex">
      <div class="flex flex-col w-full px-4 py-8 overflow-y-auto border-b lg:border-r lg:h-screen lg:w-64">


        <div class="flex flex-col justify-between mt-10">
          <aside>
            <ul class="mt-2">
              <li>
                <a class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md bg-gray-50 @if(request()->routeIs('dashboard')) bg-gray-50 border-indigo-500 border-l-4 @endif" href="/dashboard" >                  
                  <x-icon name="home" class="w-6 h-6"/>
                  <span class="mx-4 font-medium">Dashboard</span>
                </a>
              </li>
              <li>
                <a class="flex items-center px-4 py-2 mt-5 text-gray-700 hover:bg-gray-200 rounded-md bg-gray-50" href="/#projects">                  
                  <x-icon name="tag" class="w-6 h-6"/>
                  <span class="mx-4 font-medium">Projects</span>
                </a>
              </li>              

              <li>
                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200 bg-gray-50" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>

                  <span class="mx-4 font-medium">Settings</span>
                </a>
              </li>

            </ul>

          </aside>

        </div>
      </div>
      <div class="w-full h-full p-4 m-8 overflow-y-auto">
        <div class="flex items-center justify-center p-16 mr-8 border-4 border-dotted lg:p-40">
          @yield('content')
        </div>
      </div>
@livewireScripts
    </body>

</html>

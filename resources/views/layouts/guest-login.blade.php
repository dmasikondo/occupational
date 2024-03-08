<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Occupational Project::@yield('title')</title>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>

        <div id="container" class="flex items-center justify-center">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <div class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="w-8 h-8 mr-2" src="{{url('/storage/images/logo.png')}}" alt="Occupational Logo">
                    Occupational
                </div>

                @yield('content')
            </div>


        </section>

        </div>

    </body>
</html>


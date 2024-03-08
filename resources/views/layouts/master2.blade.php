<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Occupational:: @yield('title','Safety')</title>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>


        <div class="container bg-gray-50 dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto main-content md:h-screen lg:py-0">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi in saepe voluptatum, rem officia facere ducimus provident distinctio, eum nulla natus. Quidem consequuntur error illum, aut sit ut tenetur vel aspernatur quae dolorem dolore blanditiis atque! Id asperiores repellendus sint eveniet, fuga impedit provident magnam inventore odio molestiae laudantium, fugiat et sed repudiandae, autem quisquam ut voluptates. Rerum reprehenderit alias commodi, ipsam placeat qui, neque repellat omnis explicabo distinctio sed ad quod praesentium reiciendis perspiciatis ab. Possimus quis id dolor delectus dolorum natus in nam repellat repudiandae, rerum quisquam. Iure, odio et? Rem assumenda aperiam perspiciatis quae sed exercitationem facere.
            </div>
            @yield('content')
        </div>
    </body>
</html>

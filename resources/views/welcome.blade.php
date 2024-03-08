<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Occupational Project</title>
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
              <div class="">
                <x-forms.success-message/>
              </div>
                @if(session()->has('errors'))
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Whooooops!</span>
                <div>
                    <span class="font-medium">Login credential not matching our records for email:</span>
                    <ul class="mt-1.5 list-disc list-inside">
                        <li>{{old('email')}}</li>
                    </ul>
                </div>
                </div>
                @endif

              <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                  <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                      <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                          Sign in to your account
                      </h1>
                      <form class="space-y-4 md:space-y-6" action="/login" method="post">
                        @csrf
                          <div>
                            <x-forms.label for="email">Your email</x-forms.label>
                            <x-forms.input type="email" name="email" id="email"  placeholder="name@company.com"  value="{{old('email')}}" />
                            @error('email')
                            <p class="text-xs italic text-red-500">{{$message}}</p>
                            @enderror
                          </div>
                          <div>
                            <x-forms.label for="password">Password</x-forms.label>
                            <x-forms.input type="password" name="password" id="password" placeholder="••••••••" required=""/>
                            @error('password')
                            <p class="text-xs italic text-red-500">{{$message}}</p>
                            @enderror
                          </div>
                          <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <x-forms.checkbox id="remember" aria-describedby="remember" name="remember_token"/>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                          </div>
                          <button type="submit" class="w-full text-indigo-600 bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                          <!-- <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                              Don’t have an account yet? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                          </p> -->
                      </form>
                  </div>
              </div>
          </div>
        </section>

        </div>

    </body>
</html>

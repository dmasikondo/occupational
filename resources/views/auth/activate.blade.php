@extends('layouts.guest-login')
@section('title')Activate Account @endsection
@section('content')
<div class="my-8">
    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        Activate your account
    </h1>
    <div class="my-8">

        <x-forms.error-message>
            <x-slot name="title">
                Whoooooops!
            </x-slot>
            <x-slot name="body">
                Token expired or was not send for email:
            </x-slot>
            <x-slot name="footer">
                {{old('email')}}
            </x-slot>
        </x-forms.error-message>

    </div>
    <form class="space-y-4 md:space-y-6" action="/login-update" method="post">
        @csrf
        <input type="hidden" name="token" value="{{$token}}">
        <div>
            <x-forms.label for="email">Your email</x-forms.label>
            <x-forms.input type="email" name="email" id="email" value="{{old('email')}}" placeholder="name@company.com"/>
            @error('email')
            <p class="text-xs italic text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div>
            <x-forms.label for="password">New Password</x-forms.label>
            <x-forms.input type="password" name="password" id="password" placeholder="••••••••" required=""/>
            @error('password')
            <p class="text-xs italic text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div>
            <x-forms.label for="password_confirmation">Confirm Password</x-forms.label>
            <x-forms.input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" required=""/>
            @error('password')
            <p class="text-xs italic text-red-500">{{$message}}</p>
            @enderror
        </div>
            <div class="flex items-center justify-between">
                <div class="flex items-start">

                <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                </div>
            </div>
        <button type="submit" class="w-full text-indigo-600 bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Activate</button>

    </form>
</div>

@endsection

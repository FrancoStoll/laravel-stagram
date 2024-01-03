<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('styles')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>DevStagram - @yield('title')</title>
 
    @livewireStyles()
</head>

<body class="bg-gray-200">
    <header class="p-5 border-b bg-white shadow">

        <div class="container mx-auto flex justify-between items-center">

            <a href="{{route('home')}}" class="text-3xl font-black">
                DevStagram
            </a>


            @auth()
                <nav class="flex gap-3 items-center justify-center">

                    <a href="{{ route('posts.create') }}"
                        class="flex items-center gap-2 bg-white p-2 text-gray-600 border rounded text-sm uppercase font-bold cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        Create Post
                    </a>

                    <a class="font-bold text-gray-600 text-sm"
                        href="{{ route('posts.index', auth()->user()->username) }}">Hello: <span
                            class="font-normal">{{ auth()->user()->username }}</span></a>


                    <form class="p-0 m-0" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Log out</button>
                    </form>
                </nav>
            @endauth

            @guest()
                <nav class="flex gap-3 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Create Account</a>
                </nav>
            @endguest



        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield('title')</h2>
        @yield('container')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 uppercase font-bold">
        DevStagram - All rights reserved {{ now()->year }}
    </footer>


    @livewireScripts()
</body>

</html>

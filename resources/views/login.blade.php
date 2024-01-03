@extends('layouts.app')

@section('title')
    Log in DevStagram
@endsection

@section('container')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        <div class="md:w-6/12">
            <img src="{{ asset('assets/login.jpg') }}" alt="login image">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if (session('msg'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ session('msg') }}
                    </p>
                @endif
                <div class="mb-5">
                    <label for="email" id="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email"
                        class="border p-3 w-full rounded-lg @error('name')
                    border-red-500
                @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password"
                        class="border p-3 w-full rounded-lg">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>



                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember">
                    <label class="text-sm text-gray-600" for="remember">Keep the session open</label>
                </div>
                <input type="submit" value="Login"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection

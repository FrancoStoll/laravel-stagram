@extends('layouts.app');

@section('title')
    Register in DevStagram
@endsection

@section('container')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        <div class="md:w-6/12">
            <img src="{{ asset('assets/registrar.jpg') }}" alt="register image">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" id="name" class="mb-2 block uppercase text-gray-500 font-bold">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name"
                        class="border p-3 w-full rounded-lg @error('name')
                            border-red-500
                        @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" id="username"
                        class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username"
                        class="border p-3 w-full rounded-lg @error('name')
                    border-red-500
                @enderror"
                        value="{{ old('username') }}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>

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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repeat
                        password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Repeat your password" class="border p-3 w-full rounded-lg">

                </div>

        

                <input type="submit" value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection

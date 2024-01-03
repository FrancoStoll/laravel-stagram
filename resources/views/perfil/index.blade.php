@extends('layouts.app')

@section('title')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('container')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">

            <form enctype="multipart/form-data" action="{{ route('perfil.store') }}" class="mt-10 md:mt-0" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username"
                        class="border p-3 w-full rounded-lg" value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="image" class="mb-2 block uppercase text-gray-500 font-bold">Image</label>
                    <input type="file" name="image" id="image" class="border p-3 w-full rounded-lg"
                        accept=".jpg, .jpeg, .png" />
                    @error('image')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>


                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" name="email" id="email" class="border p-3 w-full rounded-lg"
                        value="{{ auth()->user()->email }}" accept=".jpg .jpeg .png" />
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mt-10 mb-2">
                    <p class="text-center font-bold text-white text-xl bg-sky-600 p-2 rounded">Optional</p>
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Current Password</label>
                    <input type="password" name="password" id="password" placeholder="Your current password"
                        class="border p-3 w-full rounded-lg">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>


                <div class="mb-5">
                    <label for="new_password" class="mb-2 block uppercase text-gray-500 font-bold">New
                        Password</label>
                    <input type="password" name="new_password" id="new_password" placeholder="Type your new password"
                        class="border p-3 w-full rounded-lg">

                    @error('new_password')
                        <p class="bg-red-500 text-white p-2 my-2 rounded-lg text-sm text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="new_password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repeat
                        New Password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        placeholder="Repeat your password" class="border p-3 w-full rounded-lg">

                    @error('new_password')
                        <p class="bg-red-500 text-white p-2 my-2 rounded-lg text-sm text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>


                <input type="submit" value="Save change"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection

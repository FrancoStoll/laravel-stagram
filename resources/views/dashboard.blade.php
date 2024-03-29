@extends('layouts.app')

@section('title')
    Profile: {{ $user->username }}
@endsection

@section('container')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ $user->img ? asset('perfiles') . '/' . $user->img : asset('assets/usuario.svg') }}"
                    alt="user image">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center py-10 md:items-start md:justify-center">
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl">{{ $user->username }}</p>

                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index') }}" class="text-gray-500 hover:text-gray-600 cursor-pointer">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>


                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    {{ $user->followers->count() }}
                    <span class="font-normal">
                        @choice('Follower|Followers', $user->followers->count())
                    </span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->followings->count() }}
                    <span class="font-normal">
                        Following
                    </span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->posts->count() }}
                    <span class="font-normal">
                        Post
                    </span>
                </p>

                @auth
                    @if ($user->id !== auth()->user()->id)
                        @if (!$user->following(auth()->user()))
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                @csrf
                                <input type="submit"
                                    class="bg-blue-600 text-white rounded-lg uppercase px-3 py-1 text-xs font-bold cursor-pointer"
                                    value="Follow">
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit"
                                    class="bg-red-600 text-white rounded-lg uppercase px-3 py-1 text-xs font-bold cursor-pointer"
                                    value="Unfollow">
                            </form>
                        @endif
                    @endif

                @endauth


            </div>
        </div>
    </div>

    <section class="container mx-auto">
        <h2 class="text-4xl text-center font-black my-10">Posts</h2>

        <x-list-post :posts="$posts" />

    </section>
@endsection

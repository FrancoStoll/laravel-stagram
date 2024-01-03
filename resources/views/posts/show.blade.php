@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('container')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->img }}" alt="imagen del post {{ $post->title }}">
            <div class="p-3 flex items-center gap-4">
                @auth

                    <livewire:like-post :post="$post" />


                @endauth

            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="">
                    {{ $post->description }}
                </p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Delete" name="delete"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer" />
                    </form>
                @endif

            @endauth

        </div>
        <div class="md:w-1/2 px-5">



            <livewire:comment :post="$post" />





        </div>

    </div>
@endsection

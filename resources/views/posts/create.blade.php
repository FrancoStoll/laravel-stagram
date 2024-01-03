@extends('layouts.app')

@section('title')
    Create a new post
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('container')
    <div class="md:flex md:items-center">

        <div class="md:w-1/2 px-10">
            <form method="POST" enctype="multipart/form-data" id="dropzone" action="{{ route('images.store') }}"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex  flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-lg mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="title" id="title" class="mb-2 block uppercase text-gray-500 font-bold">title</label>
                    <input type="text" id="title" name="title" placeholder="Title here"
                        class="border p-3 w-full rounded-lg @error('title')
                            border-red-500
                        @enderror"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">description</label>
                    <textarea name="description" id="description" placeholder="Description here"
                        class="border p-3 w-full rounded-lg 
                    @error('description')
                        border-red-500
                    @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="hidden" name="img" value="{{ old('img') }}">
                    @error('img')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}
                        </p>
                    @enderror
                </div>
                <input type="submit" value="Post"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                </from>
        </div>
    </div>
@endsection

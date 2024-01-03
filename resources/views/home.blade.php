@extends('layouts.app')

@section('title')
    Home
@endsection

@section('container')

    
    <x-list-post :posts="$posts" />

@endsection

@extends('admin.master')
@section('pageTitle')
    {{ $directory->slug }}
@endsection
@section('content')
    <img class="d-block mx-auto" style="width:60rem" src="{{ asset('storage'.'/'.$directory->image) }}" alt="">
    <h4 class="text-center" style="margin-top: 3rem;">{{ $directory->title }}</h4>
    <div class="container mt-4 mb-3">
        <article style="text-align: justify; text-justify: inter-word">{!! $directory->description !!}</article>
        <small>category: {{ $directory->category->name }} |</small>
        <small>{{ $directory->updated_at->todatestring() }}</small> 
    </div>
    <div class=" container mt-4">
        <small>auhtor: {{ $directory->author }}</small>
    </div>
@endsection
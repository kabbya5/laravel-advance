@extends('layouts.app')
@section('content')
    <div class="mt-4">
        @foreach ($products as $item)
            <h2>{{ $item->title }} </h2>
            <p> {{ $item->body }}</p>
        @endforeach
    </div> 
@endsection
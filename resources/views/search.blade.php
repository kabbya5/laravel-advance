@extends('layouts.app')
@section('content')
    <div class="mt-4">
        <form action="{{ route('scout.search') }}" method="GET">
            @csrf
            <div class="flex flex-col">
                <label> Search here </label>
                <input type="text" class="mt-4" name="search">
            </div>
        </form>
    </div> 
@endsection 
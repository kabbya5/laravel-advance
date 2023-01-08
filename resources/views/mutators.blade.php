@extends('layouts.app')
@section('content')
    <div class="container">
        
        <div class="row gx-5">
            @foreach ($products as $item)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="{{ asset($item->img) }}" alt="{{ $item->title }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $item->title }}</h5>
                        <p class="card-text"> {{ str_limit($item->body,100,'...') }} </p>
                        <a href="{{ $item->firstChar() }}" class="btn btn-outline-primary btn-sm"> Read more!</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
            
        
    </div>
@endsection
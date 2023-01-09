@extends('layouts.app')

@section('content')
    <div class="p-5 text-center bg-light">
        <div class="col-4 mx-auto">
            <img  class="img-fluid " src="https://previews.123rf.com/images/kaymosk/kaymosk1804/kaymosk180400006/100130939-error-404-page-not-found-error-with-glitch-effect-on-screen-vector-illustration-for-your-design-.jpg" alt="">
        </div>
        {{-- <h1 class="mb-3">{{ Session::get('error') }}</h1> --}}
        <h4 class="mb-3">{{ $error }}</h4>
        <a class="btn btn-primary" href="" role="button">Call to action</a>
    </div>
@endsection


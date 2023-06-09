@extends('layouts.app')
@section('content')
    @foreach ($posts as $img)
    <p>{{ $img->post_title }}</p>
        <img src="{{asset('/storage/images/post/'.$img->post_img)  }}" alt="">
    @endforeach
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="form" action="{{ route('create.post') }}" method="POST" enctype='multipart/form-data'>
            @csrf 
            <div class="form-group mb-4">
                <label for="post_title"> Post Title </label> 
                <input class="form-control mt-2 @error('post_title') is-invalid @enderror"
                name="post_title" 
                value="{{ old('post_title') }}" placeholder="Post title">
    
                @error('post_title')
                    <p class="alert alert-danger"> {{ $message }} </p> 
                @enderror
            </div>
    
            <div class="form-group mb-4">
                <label for="post_excerpt"> Post Excerpt </label>
                <textarea name="post_excerpt" cols="30" rows="4" 
                class="form-control mt-2 @error('post_excerpt') is-invalid @enderror">
                    {{ old('post_excerpt') }}
                </textarea>

                @error('post_excerpt')
                    <p class="alert alert-danger"> {{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="post_img"> Post Image </label>
                <input type="file" class="mt-2 form-control @error('post_img') is-invalid @enderror" name="post_img">
                @error('post_img')
                    <p class="alert alert-danger"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-4 form-group">
                <label for="post_body"> Post body </label>
                <textarea name="post_body" cols="30" rows="10"
                    class="form-control mt-2 @error('post_body') is-invalid @enderror">
                    {{ old('post_body') }}
                </textarea>
                @error('post_body')
                    <p class="alert alert-danger"> {{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary"> Create Post </button>

        </form>
    </div>
    
@endsection
@extends('app')
@section('content')
<div>
    <div class="my-4"> 
        <ul class="nav">
            <li class="nav-items">
                <a href="" class="nav-link active" data-status="all"> ALL Post </a>
            </li>
            <li class="nav-items">
                <a href="" class="nav-link" data-status="published"> Published  </a>
            </li>
            <li class="nav-items">
                <a href="" class="nav-link" data-status="schedule"> Schedule  </a>
            </li>
            <li class="nav-items">
                <a href="" class="nav-link" data-status="draft"> Draft  </a>
            </li>
            <li class="nav-items">
                <a href="" class="nav-link" data-status="trashed"> Trashed </a>
            </li>
        </ul>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col" width="50">#</th>
            <th scope="col"> Post Title </th>
            <th scope="col" width="150"> Date </th>
            <th scope="col" width="150"> Action </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $index => $post)
            <tr>
                <th> {{ $index+1 }} </th>
                <td> {{ $post->post_title }} </td>
                <td> 
                    <abbr title="{{ $post->dateFormatted(true) }}"> {{ $post->dateFormatted() }} </abbr>
                    {!! $post->publicationLabel() !!}
                </td>
                <td> 
                    <a href="" class="btn btn-outline-primary btn-sm"> 
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="" class="btn btn-sm btn-outline-danger">
                        <i class="fa-regular fa-trash-can"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex">
        <span class="text-right"> {{ $posts_count }} </span>
        <div class="d-flex my-5">
            {{ $posts->links() }}
        </div>
        
    </div>
</div>

@endsection

@section('script')
<script> 
    $(document).ready(function(){
        $(".nav-link").each(function(index){
            $(this).on("click", function(){
                let status = $(this).attr('data-status');
                $.ajax({
                    type:"GET",
                    url:"{{ route('posts.index'," + status +") }}",
                    dataType:'json',
                    success: function(data){
                        
                    }

                })
            })
        })
    })
</script>
@endsection
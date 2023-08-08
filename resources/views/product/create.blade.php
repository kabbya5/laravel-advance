@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('ajax.store') }}" method="POST" class="form">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label"> Product title </label>
                <input type="text" class="form-control" id="title" name='title' placeholder="product-title">
                <p class="text-danger error-title"></p>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Product description</label>
                <textarea class="form-control" id="body" name='body' rows="7"></textarea>
                <p class="text-danger error-body"></p>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label"> Product Image </label>
                <input type="file" class="form-control" id="img" name='img'>
                <p class="text-danger error-img"></p>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label"> Product Price </label>
                <input type="text" class="form-control" id="price" name='price' placeholder="product-price">
                <p class="text-danger error-price"></p>
            </div>

            <button type="submit" class="btn btn-primary"> Submit </button>
        </form>
        
    </div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>
    $(function(){
       $('.form').on('submit',function(e){
        e.preventDefault();
        
        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data: new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,

            success:function(data){
                if($.isEmptyObject(data.error)){
                    console.log(data);
                    alert('success');  
                }else{
                    $.each(data.error, function(key, val){
                        $('p.error'+'-'+key).text(val[0]);
                        $('p.error'+'-'+key).siblings().addClass('is-invalid');
                    }) 
                }
            }
        })
       }) 
    })
</script>
@endsection
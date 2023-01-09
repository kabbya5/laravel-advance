@if(Session()->has('error'))
    <div class="alert alert-errors">
        {{ session()->get('error') }}
    </div>
@elseif (Session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    
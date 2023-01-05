<div class="mb-3 form-group container col-md-6 mx-auto">
    <label for="{{ $name }}" class="form-label"> {{ $name }} </label>
    <input class="form-control" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}" {{ $multiple }}>
</div>
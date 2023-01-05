<div class="alert alert-{{ $type }}">
    @if ($message)
    {{ $message }}
    @endif
    {{ $slot }}
</div>
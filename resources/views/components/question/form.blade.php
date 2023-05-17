@props([
    'action',
    'post' => null,
    'put' => null,
    'delete' => null
])
<form action="{{ $action }}" method='post' class="relative">
    @csrf
    
    @if($post)
        @method('POST')
    @endif

    @if($put)
        @method('PUT')
    @endif

    @if($delete)
        @method('DELETE')
    @endif

    {{ $slot }}
</form>
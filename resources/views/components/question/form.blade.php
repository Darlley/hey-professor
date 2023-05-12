@props([
    'action',
    'post' => null,
    'put' => null,
    'delete' => null
])
<form {{ $action }} class="relative" method="POST">
    @csrf
    
    @if($put)
        @method('PUT')
    @endif

    @if($delete)
        @method('DELETE')
    @endif

    {{ $slot }}
</form>
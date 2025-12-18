<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}" @if($hasFiles)
enctype="multipart/form-data" @endif {{ $attributes }}>
    @csrf

    @if(!in_array(strtoupper($method), ['GET', 'POST']))
        @method($method)
    @endif

    {{ $slot }}
</form>
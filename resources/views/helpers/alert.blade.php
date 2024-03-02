
@if(session()->has('message') && session()->has('status'))
    @if (sesion('status'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Todo bien!',
                text: '{{ session('message') }}',
            });
        </script>
    @else
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ha ociurrido un error',
                text: '{{ session('message') }}',
            });
        </script>

    @endif

@endif

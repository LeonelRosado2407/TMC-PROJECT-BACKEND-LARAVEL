
@if(session()->has('message') && session()->has('status'))
    @if (session('status'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Todo bien!',
                text: '{{ session('message') }}',
                background: "#1F2937",
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#0E9F6E'
            });
        </script>
    @else
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ha ociurrido un error',
                text: '{{ session('message') }}',
                background: "#1F2937",
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#F05252'
            }); 
        </script>

    @endif

@endif

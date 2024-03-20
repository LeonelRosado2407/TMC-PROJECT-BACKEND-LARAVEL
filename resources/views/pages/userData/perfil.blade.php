@extends('layouts.app')

@section('content')
<div class="relative max-w-2xl mx-auto  bg-purple-700">
        <!-- top navbar -->
        <div class="flex justify-between items-center text-sm bg-purple-700">
            <a href="#" class="flex  items-center">
                <span class="font-bold">Nombre</span>
            </a>
        </div>
        <!-- top navbar end -->
    
        <!-- top header -->
        <div class="flex flex-col justify-center items-center my-5">
            <img src="{{$userData->imgPerfil ?? asset('black/img/monone.png')}}" class="w-16 h-16 bg-cover bg-center bg-no-repeat rounded-full" ></img>
            <span class="my-3">@_geeeky_gamer</span>

            <div class="flex gap-10 text-sm">
                <div class="flex flex-col items-center">
                    <span class="font-bold">10</span>
                    <span>Skins</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="font-bold">1.20 K</span>
                    <span>Monedas</span>
                </div>
            </div>

            <button class="my-5 px-5 py-2 font-semibold text-sm border border-gray-400">Edit profile</button>

            <p class="mb-3">Description about me goes here</p>
        </div>
        <!-- top header end -->


        <!-- middle navigation -->
        <div class="grid grid-cols-4">
            <h1>Mis skins</h1>

        </div>
        <!-- middle navigation end -->

        <!-- video grid -->
        <div class="grid grid-cols-4 gap-0.5 mt-2">

            <div class="relative w-full h-60 bg-cover bg-center bg-no-repeat" style="background-image: url('https://sf-tk-sg.ibytedtos.com/obj/tiktok-web-sg/tt-sg-article-cover-351970d5103b996fbe9ddc67f6d668cc.gif');">
                <!-- small player with views -->
                <div class="absolute bottom-1 left-1 flex gap-1 text-white text-xs items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>800</span>
                </div>
                <!-- small player with views end -->
            </div>
        </div>
        <!-- video grid end -->

    </div>

	</div>

</div>




@endsection
@section('extra-js')
	<script type="module">

		$(document).ready(function() {
			const previsualizador = $('#profile-image-preview');
			const input = $('#profile-image');
			console.log(previsualizador, input);
			$('#profile-image').change(function(event) {
				var input = event.target;
				var reader = new FileReader();
				reader.onload = function() {
					var previewImage = $('#profile-image-preview');
					previewImage.attr('src', reader.result);
				}
				reader.readAsDataURL(input.files[0]);
			});
		});
			
	</script>
@endsection
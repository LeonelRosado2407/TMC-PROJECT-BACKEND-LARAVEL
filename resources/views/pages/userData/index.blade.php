@extends('layouts.app')

@section('content')

<div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

	<!--Main Col-->
	<div
		class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-purple-700 outline-gray-400 opacity-75 mx-6 lg:mx-0">

		<div class="p-4 md:p-12 text-left">
			<!-- Image for mobile view-->
			<div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
				style="background-image: url('{{$userData->imgPerfil ?? asset('black/img/monone.png')}}')"></div>
			<div>
				<h1
					class="font-gomarice mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
					<span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Nos
						Gustaria</span> conocerte mejor</h1>

				<form class="max-w-md mx-auto">
					<input-profile
					name="names"
					type="text"
					texto="Nombres"
					value=""
					></input-profile>

					<input-profile
					name="lastNames"
					type="text"
					texto="Apellidos"
					value=""
					></input-profile>

					<div class="relative w-full mb-5 group">
						<label for="gender" class="block mb-2 text-lg pl-0 text-white">¿Cómo te identificas?</label>
						<select id="gender" 
							class=" block py-2.5 px-0 w-full text-lg bg-purple-700 border-0 border-b-2 appearance-none text-white border-green-500 focus:outline-none focus:ring-0 peer bg-gradient-to-br from-green-600 to-blue-600 focus:pl-2"
							name="gender"
						>
							<option value="" selected disabled>Selecciona una opción</option>
							<option value="Hombre">Hombre</option>
							<option value="Mujer">Mujer</option>
							<option value="Otros">Otros</option>
						</select>
					</div>

					<input-profile
					name="age"
					type="number"
					texto="Edad"
					value=""
					></input-profile>

					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="birthday" id="birthday"
							class="block py-2.5 px-0 w-full text-lg text-gray-300 bg-transparent border-0 border-b-2 border-green-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
							placeholder=" " style="border-image: linear-gradient(to right, #0E9F6E, #3F83F8) 1;"
							datepicker
							autocomplete="off"
							>
						<label for="birthday"
							class=" peer-focus:font-medium absolute text-lg text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-[5px] peer-focus:text-green-300  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">
							¿Cuándo Cumples  Años?
						</label>
					</div>
  

				</form>

			</div>

		</div>

	</div>

	<!--Img Col-->
	<div class="w-full lg:w-2/5">
		<!-- Big profile image for side bar (desktop) -->
		<label for="profile-image" class="cursor-pointer">
			<img src="{{$userData->imgPerfil ?? asset('black/img/monone.png')}}"
				class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block"
				id="profile-image-preview">
		</label>
		<input type="file" id="profile-image" class="hidden" accept="image/*" name="imgPerfil" onchange="previewProfileImage(event)">
	</div>


	<!-- Pin to top right corner -->
	<div class="absolute top-0 right-0 h-12 w-18 p-4">
		<button class="js-change-theme focus:outline-none">🌙</button>
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
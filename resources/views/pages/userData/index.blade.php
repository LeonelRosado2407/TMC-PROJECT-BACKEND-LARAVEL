@extends('layouts.app')

@section('content')

<div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

	<!--Main Col-->
	<div
		class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-purple-700 outline-gray-400 opacity-75 mx-6 lg:mx-0">

		<div class="p-4 md:p-12 text-center lg:text-left">
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
						<label for="underline_select" class="sr-only">Underline select</label>
						<select id="underline_select" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-white border-green-300 focus:outline-none focus:ring-0 focus:border-green-500 peer bg-gradient-to-br from-green-400 to-blue-600">
							<option value="US">United States</option>
							<option value="CA">Canada</option>
							<option value="FR">France</option>
							<option value="DE">Germany</option>
						</select>
					</div>

				</form>

			</div>

		</div>

	</div>

	<!--Img Col-->
	<div class="w-full lg:w-2/5">
		<!-- Big profile image for side bar (desktop) -->
		<img src="{{$userData->imgPerfil ?? asset('black/img/monone.png')}}"
			class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block">

	</div>


	<!-- Pin to top right corner -->
	<div class="absolute top-0 right-0 h-12 w-18 p-4">
		<button class="js-change-theme focus:outline-none">🌙</button>
	</div>

</div>


@endsection
<div class="grid md:grid-cols-2 mb-5 w-full">
    <div>
        <div class="relative z-0 w-full mb-5 pr-10 group">
            <input-required 
            name="name" 
            texto="Nombre de la Skin" 
            @if (isset($errors) && $errors->has('name'))
                error="{{$errors->first('name')}}"
            @else
                error="El nombre de la skin es requerido"
            @endif
            value="{{$skin->nombre}}"
            tipo-input="text"
            ></input-required>
        </div>
        <div class="relative z-0 w-full mb-5 pr-10 group">
            <input-required 
            
            name="price" 
            texto="Precio de la Skin" 
            @if (isset($errors) && $errors->has('price'))
                error="{{$errors->first('price')}}"
            @else
                error="El precio de la skin es requerido"
            @endif
            value="{{$skin->precio}}"
            tipo-input="number"
            ></input-required>
        </div>

        <div class="relative z-0 w-full mb-5 pr-10 group">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estatus de la Skin</label>
            <select id="countries" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option {{ $skin->estatus == 1 || $skin->estatus == null ? 'selected' : '' }} value="{{1}}">Alta</option>
            <option {{ $skin->estatus == 0 && $skin->estatus !== null ? 'selected' : '' }} value="{{0}}">Baja</option>
            </select>
            @if (isset($errors) && $errors->has('status'))
                @error('status')
                    <p class="text-xs text-red-500 dark:text-red-400">{{$message}}</p>
                @enderror
            @endif
        </div>
    </div>

    <upload-file
    value = "{{$skin->imagen}}"
    ></upload-file> 

</div>
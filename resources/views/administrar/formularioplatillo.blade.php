<style>
    .custom-btn {
        background-color: #9CA64E;
        border-color: #9CA64E;
    }
    .custom-btn:hover {
        background-color: #87983D;
        border-color: #87983D;
    }
</style>

<div class="text-center">
    @csrf
    <div class="form-group " >
        <label for="nombre">Nombre:</label>
        <input type="text" style="width: 400px; margin: 0 auto; padding: 10px; border: 1px solid #ccc; 
        border-radius: 4px; box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" class="form-control" 
        id="nombre" name="nombre" value="{{ isset($datosplatillo->nombre) ? $datosplatillo->nombre : '' }}">
    </div>
    <br>
    <div class="form-group">
        <label for="imagen">Imagen:</label>
        <br>
        @if(isset($datosplatillo->imagen))
            <img src="{{ asset('storage/' . $datosplatillo->imagen) }}" alt="" width="100" 
            style="border: 3px solid #9F625B; border-radius: 5px;">
        @endif
        <br>
        <input type="file" class="form-control-file" id="imagen" name="imagen">
    </div>
    <br>
    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea style="width: 400px; min-width: 200px; height: auto; min-height: 50px; margin: 0 auto; 
        padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" 
        class="form-control" id="descripcion" 
        name="descripcion">{{ isset($datosplatillo->descripcion) ? $datosplatillo->descripcion : '' }}</textarea>
    </div>
    <br>
    <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="text" style="width: 400px; margin: 0 auto; padding: 10px; border: 1px solid #ccc; 
        border-radius: 4px; box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" class="form-control" id="precio" 
        name="precio" value="{{ isset($datosplatillo->precio) ? $datosplatillo->precio : '' }}">
    </div>
    <br>
    <div class="form-group">
        <label for="categoria">Categoría:</label>
        <select class="form-control" style="width: 400px; margin: 0 auto; padding: 10px; border: 1px solid #ccc; 
        border-radius: 4px; box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" id="categoria" name="categoria">
            @if(isset($datosplatillo->categoria))
                <option value="{{ $datosplatillo->categoria }}">{{ $datosplatillo->categoria }}</option>
            @endif
            @foreach($lista as $categoria)
                <option value="{{ $categoria->nombre }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-outline-success" style="width: 120px;">Enviar</button>
</div>

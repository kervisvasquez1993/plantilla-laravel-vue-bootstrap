@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <link
        rel="stylesheet"
        href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />

@endsection
@section('content')
    <div class="container">
        <h1 class="text-center m-4">Registrar</h1>
        <div class="mt-5 row justify-content-center">
            <form action=""
                  class="col-md-9 col-xs-12 card card-body"
            >
                <fieldset class="border p-4">
                    <legend class="text-primary text-center">Nombre y categoria</legend>
                    <div class="form-group">
                        <label for="nombre">Nombre Establecimiento</label>
                        <input
                            type="text"
                            id="nombre"
                            class="form-control  @error('nombre') aria-invalid  @enderror"
                            placeholder="Nombre establecimiento"
                            name="nombre"
                            value="{{old('nombre')}}"
                        >
                        @error('nombre')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría </label>
                        <select name="categoria_id"
                                id="categoria"
                                class="form-control  @error('categoria_id') aria-invalid  @enderror"
                        >
                            <option value="" selected disabled>---Selecionar---</option>
                            @foreach($categorias as $categoria )
                                <option
                                    value="{{$categoria->id}}"
                                    {{old('$categoria_id') == $categoria->id ? 'select' : ''}}
                                >{{$categoria->nombre}}</option>
                            @endforeach

                        </select>
                    </div>

                   <div class="form-group">
                        <label for="imagen_principal">Imagen Principal</label>
                        <input
                            type="file"
                            id="imagen_principal"
                            class="form-control  @error('imagen_principal') aria-invalid  @enderror"

                            name="imagen_principal"
                            value="{{old('imagen_principal')}}"
                        >
                        @error('nombre')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror

                    </div>

                </fieldset>

                <fieldset class="border p-4">
                    <legend class="text-primary text-center">Direccion del establecimiento</legend>

                    <div class="form-group">
                        <label for="formbuscador">Ingresa la direccion del establecimiento</label>
                        <input
                            type="text"
                            id="formbuscador"
                            class="form-control"
                            placeholder="Calle del negocio del establecimiento"
                            name="nombre"
                            value="{{old('nombre')}}"
                        >
                        <p class="text-secundary mt-5 mb-3 text-center">El asistente colocara una direccion estimada, mueve el ping al lugar correcto</p>

                    </div>
                    <div class="form-group">
                        <div id="mapa" style="height: 400px">
                        </div>
                    </div>
                    <a href="" class="informacion"> Confirme que los siguientes parrafos son correctos</a>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input  type="text"
                                id="direccion"
                                class="form-control @error('direccion') is-invalid @enderror"
                                placeholder="Direccion"
                                value="{{old('direccion')}}"
                        >
                        @error('direccion')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="colonia">Colonia</label>
                        <input  type="text"
                                id="colonia"
                                class="form-control @error('colonia') is-invalid @enderror"
                                placeholder="colonia"
                                value="{{old('colonia')}}"
                        >
                        @error('direccion')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror

                    </div>
                    <input type="hidden" id="lat" name="lat" value="{{old('lat')}}">
                    <input type="hidden" id="lng" name="lng" value="{{old('lng')}}">
                </fieldset>

                <fieldset class="border p-4 mt-5">
                    <legend  class="text-primary">Información Establecimiento: </legend>
                        <div class="form-group">
                            <label for="nombre">Teléfono</label>
                            <input 
                                type="tel" 
                                class="form-control @error('telefono')  is-invalid  @enderror" 
                                id="telefono" 
                                placeholder="Teléfono Establecimiento"
                                name="telefono"
                                value="{{ old('telefono') }}"
                            >
    
                                @error('telefono')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                        </div>
    
                        
    
                        <div class="form-group">
                            <label for="nombre">Descripción</label>
                            <textarea
                                class="form-control  @error('descripcion')  is-invalid  @enderror" 
                                name="descripcion"
                            >{{ old('descripcion') }}</textarea>
    
                                @error('descripcion')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="nombre">Hora Apertura:</label>
                            <input 
                                type="time" 
                                class="form-control @error('apertura')  is-invalid  @enderror" 
                                id="apertura" 
                                name="apertura"
                                value="{{ old('apertura') }}"
                            >
                            @error('apertura')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="nombre">Hora Cierre:</label>
                            <input 
                                type="time" 
                                class="form-control @error('cierre')  is-invalid  @enderror" 
                                id="cierre" 
                                name="cierre"
                                value="{{ old('cierre') }}"
                            >
                            @error('cierre')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                </fieldset>

                <fieldset class="border p-4 mt-5">
                    <legend  class="text-primary">Imágenes Establecimiento: </legend>
                        <div class="form-group">
                            <label for="imagenes">Imagenes</label>
                            <div id="dropzone" class="dropzone form-control"></div>
                        </div>
                </fieldset>
                <input type="hidden" id="uuid" name="uuid" value="{{Str::uuid()->toString()}}" >
                <input type="submit" class="btn btn-primary mt-3 d-block" value="Registrar Establecimiento">

            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin="">
    </script>
    <script src="https://unpkg.com/esri-leaflet" defer></script>
    <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js" integrity="sha256-OG/103wXh6XINV06JTPspzNgKNa/jnP1LjPP5Y3XQDY=" crossorigin="anonymous" defer></script>
    <script></script>
@endsection

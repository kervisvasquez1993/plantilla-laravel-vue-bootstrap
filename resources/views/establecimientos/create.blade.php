@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
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
                        <lavel for="categoria">Categoría</lavel>
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
                        <div id="mapa" style="height: 400px">
                        </div>
                    </div>
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
                </fieldset>

            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const lat = 10.2064567;
            const lng = -68.0127715;

            const mapa = L.map('mapa').setView([lat, lng], 18);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mapa);

            let marker;

            // agregar el pin
            marker = new L.marker([lat, lng]).addTo(mapa);

        });
    </script>
@endsection

import { OpenStreetMapProvider } from 'leaflet-geosearch';
const provider = new OpenStreetMapProvider();


document.addEventListener('DOMContentLoaded', () => {


    let mapaForm = document.getElementById('mapa')
    if (mapaForm)

    {
        const lat = 10.2064567;
        const lng = -68.0127715;

        const mapa = L.map('mapa').setView([lat, lng], 18);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapa);

        let marker;
        const geocodeService = L.esri.Geocoding.geocodeService()

        // buscador de direcciones
        const buscador = document.querySelector('#formbuscador')
        buscador.addEventListener('input', buscarDireciones)

        // agregar el pin
        marker = new L.marker([lat, lng], {
            draggable : true,
            autoPan   : true
        }).addTo(mapa);

        // detectar movimiento  del market
        marker.on('moveend', function (e){
            marker = e.target
             let posicion = marker.getLatLng() // ===== getLatLng() ==== trae la latitud y lonjitud
            //centrar automaticamente
            mapa.panTo(new L.LatLng( posicion.lat, posicion.lng));

            // Reverse Geocoding cuando el usuario ubica el pin
            geocodeService.reverse().latlng(posicion,18).run(function (error, resultado){
               // console.log(error)
                //console.log(resultado)
                marker.bindPopup(resultado.address.LongLabel)
                marker.openPopup()

                // llenar los campos
                llenarInput(resultado)
            })

        })

        // funciones del codigo
        function buscarDireciones(e){
            if(e.target.value.length >= 10)// pasamos el evento sin necesidad de pasarlo en la funcion
            {
                    console.log(provider)
            }
        }
        function llenarInput(resultado){

            document.querySelector('#direccion').value = resultado.address.Address || ''
            document.querySelector('#colonia').value = resultado.address.Neighborhood || ''
            document.querySelector('#lat').value = resultado.latlng.lat
            document.querySelector('#lng').value = resultado.latlng.lng

        }
    }


});

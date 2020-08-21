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

        // agregar el pin
        marker = new L.marker([lat, lng]).addTo(mapa);
    }


});

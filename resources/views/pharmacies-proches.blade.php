@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h2 class="mb-4"><i class="fas fa-map-marker-alt text-success"></i> Pharmacies proches de moi</h2>
    <div class="row">
        <div class="col-md-7 mb-4">
            <div id="map-proches" style="height: 350px; width: 100%; border-radius: 10px; overflow: hidden;"></div>
        </div>
        <div class="col-md-5">
            <h5>Liste des pharmacies</h5>
            <ul class="list-group" id="pharmacies-list">
                <!-- Les pharmacies seront injectées ici par JS -->
            </ul>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
// Exemples de pharmacies (statique)
const pharmacies = [
    { name: 'Pharmacie Touba', lat: 14.6928, lng: -17.4467 },
    { name: 'Pharmacie Médina', lat: 14.7000, lng: -17.4500 },
    { name: 'Pharmacie Liberté', lat: 14.7050, lng: -17.4400 }
];

function getDistance(lat1, lng1, lat2, lng2) {
    // Haversine formula
    const R = 6371; // km
    const dLat = (lat2-lat1) * Math.PI/180;
    const dLng = (lng2-lng1) * Math.PI/180;
    const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
              Math.cos(lat1 * Math.PI/180) * Math.cos(lat2 * Math.PI/180) *
              Math.sin(dLng/2) * Math.sin(dLng/2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    return R * c;
}

document.addEventListener('DOMContentLoaded', function() {
    // Récupère les coordonnées depuis l'URL
    const urlParams = new URLSearchParams(window.location.search);
    const lat = parseFloat(urlParams.get('lat')) || 14.6928;
    const lng = parseFloat(urlParams.get('lng')) || -17.4467;

    // Initialise la carte
    var map = L.map('map-proches').setView([lat, lng], 14);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Marqueur position utilisateur
    var userMarker = L.marker([lat, lng], {icon: L.icon({iconUrl: 'https://cdn-icons-png.flaticon.com/512/64/64113.png', iconSize: [32,32], iconAnchor: [16,32]})}).addTo(map)
        .bindPopup('Vous êtes ici').openPopup();

    // Ajoute les pharmacies et calcule la distance
    let listHtml = '';
    pharmacies.forEach(pharma => {
        const dist = getDistance(lat, lng, pharma.lat, pharma.lng);
        L.marker([pharma.lat, pharma.lng]).addTo(map)
            .bindPopup(pharma.name + '<br>' + dist.toFixed(2) + ' km');
        listHtml += `<li class="list-group-item d-flex justify-content-between align-items-center">
            <span><i class='fas fa-clinic-medical text-success me-2'></i> ${pharma.name}</span>
            <span class="badge bg-success">${dist.toFixed(2)} km</span>
        </li>`;
    });
    document.getElementById('pharmacies-list').innerHTML = listHtml;
});
</script>
@endsection 
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('peta-kawasan-hutan');
    if (!container) return;

    // Titik tengah default: Kota Palu, Sulawesi Tengah
    const map = L.map('peta-kawasan-hutan', {
        center: [-0.8917, 119.8707],
        zoom: 8,
        scrollWheelZoom: true,
    });

    // Base map dari OpenStreetMap — gratis, tanpa API key
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 19,
    }).addTo(map);

    L.control.scale({ imperial: false }).addTo(map);

    const loadingEl = document.getElementById('peta-loading');
    const emptyStateEl = document.getElementById('peta-empty-state');

    // ==========================================================
    // Path file GeoJSON — GANTI/TAMBAHKAN file di sini nanti
    // ==========================================================
    const GEOJSON_PATH = '/data/kawasan-hutan.geojson';

    fetch(GEOJSON_PATH)
        .then((res) => {
            if (!res.ok) throw new Error('File tidak ditemukan');
            return res.json();
        })
        .then((geojsonData) => {
            loadingEl?.classList.add('hidden');

            const layer = L.geoJSON(geojsonData, {
                style: () => ({
                    color: '#2F5D45',      // warna garis: primary
                    weight: 1.5,
                    fillColor: '#6E9B76',  // warna isi: secondary (sementara, sebelum ada mapping per fungsi)
                    fillOpacity: 0.35,
                }),
                onEachFeature: (feature, layerItem) => {
                    // Sementara: tampilkan SEMUA properti apa adanya di popup,
                    // karena kita belum tahu nama field pasti dari data asli.
                    // Nanti ini akan disederhanakan begitu struktur field dikonfirmasi tim GIS.
                    if (feature.properties) {
                        const rows = Object.entries(feature.properties)
                            .map(([key, val]) => `<div class="flex justify-between gap-3 py-1 border-b border-black/5 last:border-0">
                                <span class="text-contrast/50">${key}</span>
                                <span class="font-medium text-contrast">${val ?? '-'}</span>
                            </div>`)
                            .join('');
                        layerItem.bindPopup(`<div class="text-xs min-w-[180px]">${rows}</div>`);
                    }
                },
            }).addTo(map);

            if (layer.getBounds().isValid()) {
                map.fitBounds(layer.getBounds(), { padding: [20, 20] });
            }
        })
        .catch(() => {
            loadingEl?.classList.add('hidden');
            emptyStateEl?.classList.remove('hidden');
        });
});

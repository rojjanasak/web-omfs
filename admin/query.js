// create map
var map = L.map('map', {
    center: [19.043806, 100.069754],
    zoom: 8
});

// base layers
/* var OSM_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});

var roads = L.tileLayer('http://{s}.google.com/vt/lyrs=r&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
 */
var hybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
}).addTo(map);

/* var terrain = L.tileLayer('http://{s}.google.com/vt/lyrs=m,t&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
 */
/* var baseLayers = {
    "OSM": OSM_Mapnik.addTo(map),
    "ถนน": roads,
    "ดาวเทียมและถนน": hybrid,
    "ภูมิประเทศ": terrain
};


var lyrGroup = L.layerGroup();
// var drawnItems = L.featureGroup().addTo(map);

var overlay = {
    "Fire": lyrGroup.addTo(map)
}; 

L.control.layers(baseLayers, overlay).addTo(map);*/


$.getJSON('http://localhost:3000/api/house', res => {
    L.geoJSON(res).addTo(map);
})




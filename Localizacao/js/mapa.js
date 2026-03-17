var map = L.map("map").setView([-23.96, -46.33], 13);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution: "© OpenStreetMap",
}).addTo(map);

var usuarioMarker = null;
var caminhaoMarker = null;
var rotaLinha = null;

var iconeCaminhao = L.icon({
  iconUrl: "img/caminhao.jpg",
  iconSize: [40, 40],
  iconAnchor: [20, 20],
});

// pegar localização do usuário
navigator.geolocation.getCurrentPosition(function (pos) {
  var lat = pos.coords.latitude;
  var lng = pos.coords.longitude;

  usuarioMarker = L.marker([lat, lng])
    .addTo(map)
    .bindPopup("📍 Você está aqui")
    .openPopup();

  map.setView([lat, lng], 15);
});

// desenhar rota
function desenharRota(lat1, lng1, lat2, lng2) {
  var url =
    "https://router.project-osrm.org/route/v1/driving/" +
    lng1 +
    "," +
    lat1 +
    ";" +
    lng2 +
    "," +
    lat2 +
    "?overview=full&geometries=geojson";

  fetch(url)
    .then((res) => res.json())
    .then((data) => {
      var coords = data.routes[0].geometry.coordinates;

      var pontos = coords.map(function (c) {
        return [c[1], c[0]];
      });

      if (rotaLinha) {
        map.removeLayer(rotaLinha);
      }

      rotaLinha = L.polyline(pontos, {
        color: "green",
        weight: 5,
      }).addTo(map);
    });
}

// atualizar caminhão
function atualizar() {
  fetch("api/posicao_caminhao.php")
    .then((r) => r.json())
    .then((data) => {
      if (!data) return;

      var lat = parseFloat(data.latitude);
      var lng = parseFloat(data.longitude);

      var pos = [lat, lng];

      if (caminhaoMarker == null) {
        caminhaoMarker = L.marker(pos, { icon: iconeCaminhao })
          .addTo(map)
          .bindPopup("🚛 Caminhão de coleta");
      } else {
        caminhaoMarker.setLatLng(pos);
      }

      // se tiver usuário desenha rota
      if (usuarioMarker) {
        var user = usuarioMarker.getLatLng();

        desenharRota(lat, lng, user.lat, user.lng);
      }
    });
}

setInterval(atualizar, 5000);

atualizar();

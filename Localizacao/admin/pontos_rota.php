<?php
include "../config/conexao.php";
$rota_id = $_GET['rota'] ?? 1;
?>

<!DOCTYPE html>
<html>

<head>

    <title>Editor de rota</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        body {
            margin: 0;
            font-family: Arial;
            display: flex;
            height: 100vh;
        }

        #painel {
            width: 320px;
            background: #2c3e50;
            color: white;
            padding: 20px;
            box-sizing: border-box;
        }

        #map {
            flex: 1;
        }

        h2 {
            margin-top: 0;
        }

        .info {
            background: #34495e;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            border: none;
            background: #27ae60;
            color: white;
            margin-right: 5px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background: #2ecc71;
        }

        .btn-limpar {
            background: #c0392b;
        }

        .parada {
            background: #34495e;
            padding: 6px;
            margin-bottom: 4px;
            border-radius: 3px;
            font-size: 13px;
        }
    </style>

</head>

<body>

    <div id="painel">

        <h2>🚛 Editor de rota</h2>

        <input type="hidden" id="rota_id" value="<?= $rota_id ?>">

        <div class="info">
            📍 Paradas: <b id="total_paradas">0</b>
        </div>

        <div class="info">
            📏 Distância total: <b id="distancia_total">0 km</b>
        </div>

        <div class="info">
            ⏱ Tempo estimado: <b id="tempo_total">0 min</b>
        </div>

        <button onclick="salvarRota()">💾 Salvar</button>
        <button onclick="limparRota()" class="btn-limpar">🗑 Limpar</button>

        <hr>

        <h3>Paradas</h3>

        <div id="lista_paradas"></div>

    </div>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>

        var map = L.map('map').setView([-23.96, -46.33], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);
        carregarRota();

        var pontos = [];
        var marcadores = [];
        var linha = null;
        
        function carregarRota() {

            var rota = document.getElementById("rota_id").value;

            fetch("buscar_rota.php?rota=" + rota)

                .then(r => r.json())

                .then(data => {

                    if (data.length == 0) return;

                    data.forEach(function (p) {

                        var lat = parseFloat(p.latitude);
                        var lng = parseFloat(p.longitude);

                        pontos.push([lat, lng]);

                        var marker = L.marker([lat, lng]).addTo(map);

                        marcadores.push(marker);

                    });

                    atualizarLista();
                    desenharLinha();

                });

        }
        // clicar no mapa
        map.on('click', function (e) {

            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            pontos.push([lat, lng]);

            var marker = L.marker([lat, lng]).addTo(map);

            marcadores.push(marker);

            atualizarLista();

            desenharLinha();

        });


        // atualizar lista lateral
        function atualizarLista() {

            var lista = document.getElementById("lista_paradas");

            lista.innerHTML = "";

            pontos.forEach(function (p, i) {

                var div = document.createElement("div");

                div.className = "parada";

                div.innerHTML = "Parada " + (i + 1);

                lista.appendChild(div);

            });

            document.getElementById("total_paradas").innerHTML = pontos.length;

        }


        function desenharLinha() {

            if (pontos.length < 2) return;

            var coordenadas = pontos.map(function (p) {
                return p[1] + "," + p[0];
            }).join(";");

            var url =
                "https://router.project-osrm.org/route/v1/driving/"
                + coordenadas +
                "?overview=full&geometries=geojson";

            fetch(url)

                .then(r => r.json())

                .then(data => {

                    if (!data.routes || data.routes.length == 0) return;

                    var rota = data.routes[0];

                    var distancia = (rota.distance / 1000).toFixed(2);
                    var tempo = (rota.duration / 60).toFixed(0);

                    document.getElementById("distancia_total").innerHTML = distancia + " km";
                    document.getElementById("tempo_total").innerHTML = tempo + " min";

                    var coords = rota.geometry.coordinates;

                    var latlng = coords.map(function (c) {
                        return [c[1], c[0]];
                    });

                    if (linha) {
                        map.removeLayer(linha);
                    }

                    linha = L.polyline(latlng, {
                        color: 'blue',
                        weight: 5
                    }).addTo(map);

                });

        }
        function limparRota() {

            if (!confirm("Apagar rota do banco?")) return;

            var rota = document.getElementById("rota_id").value;

            fetch("apagar_rota.php", {

                method: "POST",

                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },

                body: "rota=" + rota

            })

                .then(r => r.text())

                .then(resp => {

                    pontos = [];

                    marcadores.forEach(function (m) {
                        map.removeLayer(m);
                    });

                    marcadores = [];

                    if (linha) {
                        map.removeLayer(linha);
                    }

                    document.getElementById("lista_paradas").innerHTML = "";
                    document.getElementById("distancia_total").innerHTML = "0 km";
                    document.getElementById("tempo_total").innerHTML = "0 min";
                    document.getElementById("total_paradas").innerHTML = "0";

                    alert("Rota apagada");

                });

        }
        // salvar
        function salvarRota() {

            var rota = document.getElementById("rota_id").value;

            fetch("salvar_pontos_rota.php", {

                method: "POST",

                headers: {
                    'Content-Type': 'application/json'
                },

                body: JSON.stringify({
                    rota: rota,
                    pontos: pontos
                })

            })

                .then(r => r.text())

                .then(resp => {

                    alert("Rota salva com sucesso");

                });

        }

    </script>

</body>

</html>
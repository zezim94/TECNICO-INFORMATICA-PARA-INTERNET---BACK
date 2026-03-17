<?php

$conn = new mysqli("localhost","root","","localizacao");

$sql="SELECT latitude,longitude
FROM gps_caminhao
ORDER BY id DESC
LIMIT 1";

$r=$conn->query($sql);

echo json_encode($r->fetch_assoc());
<?php
// Define a URL base do seu projeto.
// IMPORTANTE: Mude se subir para hospedagem.
define('BASE_URL', 'http://localhost/kabyte/');

define('MP_PUBLIC_KEY', 'TEST-381967fc-c19f-40ec-adb8-29619e87e33c');
define('MP_ACCESS_TOKEN', 'TEST-4999020493284581-122623-57b9689cf06f4b34e1a3327a5d3f0a14-198821613');

define('GOOGLE_CLIENT_ID', '173313315492-4ed9g26cl6qfsi7tikbg76s06q3q99f3.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
// A URL deve ser EXATAMENTE igual à cadastrada no console do Google
define('GOOGLE_REDIRECT_URL', BASE_URL . 'index.php?rota=login/google_callback');




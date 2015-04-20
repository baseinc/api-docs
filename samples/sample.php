<?php
// アクセストークンを取得するサンプルコード
$params = array(
    'client_id'     => '2aacd57f14ffe6edafd402934593a0ce',
    'client_secret' => '2e3389dc5fe7c9607115541e409dd2c3',
    'code'          => '182e28b20f138dd0def9e76f623531f7',
    'grant_type'    => 'authorization_code',
    'redirect_uri'  => 'http://hogehoge.com/callback',
);
$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
);
$request_options = array(
    'http' => array(
        'method'  => 'POST',
        'content' => http_build_query($params),
        'header'  => implode("\r\n", $headers),
    ),
);
$context = stream_context_create($request_options);
$response_body = file_get_contents('https://api.thebase.in/1/oauth/token', false, $context);

// 注文情報を取得するサンプルコード
$headers = array(
    'Authorization: Bearer 9f20168eeff6355716e99cc7d46f1d26',
);
$request_options = array(
    'http' => array(
        'method' => 'GET',
        'header' => implode("\r\n", $headers),
    ),
);
$context = stream_context_create($request_options);
$response_body = file_get_contents('https://api.thebase.in/1/orders?limit=10&offset=0', false, $context);
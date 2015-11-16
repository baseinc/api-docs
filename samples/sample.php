<?php
// アクセストークンを取得するサンプルコード
$params = array(
    'client_id'     => 'xxxxxxxxxx',
    'client_secret' => 'yyyyyyyyyy',
    'code'          => 'zzzzzzzzzz',
    'grant_type'    => 'authorization_code',
    'redirect_uri'  => 'http://sample.com/sample/callback',
);
$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
);
$request_options = array(
    'http' => array(
        'method'  => 'POST',
        'content' => http_build_query($params),
        'header'  => implode("\r\n", $headers),
        'ignore_errors' => true,
    ),
);
$context = stream_context_create($request_options);
$response_body = file_get_contents('https://api.thebase.in/1/oauth/token', false, $context);

// 注文情報を取得するサンプルコード
$headers = array(
    'Authorization: Bearer xxxxxyyyyyzzzzz',
);
$request_options = array(
    'http' => array(
        'method' => 'GET',
        'header' => implode("\r\n", $headers),
    ),
);
$context = stream_context_create($request_options);
$response_body = file_get_contents('https://api.thebase.in/1/orders?limit=10&offset=0', false, $context);

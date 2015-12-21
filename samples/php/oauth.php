<?php
// アクセストークンを取得する
define('API_HOST',      'https://api.thebase.in');
define('API_VERSION',   '1');
define('CLIENT_ID',     ''); # YOUR_CLIENT_ID
define('CLIENT_SECRET', ''); # YOUR_CLIENT_SECRET
define('REDIRECT_URI',  ''); # YOUR_REDIRECT_URI

$params = array(
    'client_id'     => CLIENT_ID,
    'client_secret' => CLIENT_SECRET,
    'redirect_uri'  => REDIRECT_URI,
    'grant_type'    => 'authorization_code',
    'code'          => '', # YOUR_CODE
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

$response_body = file_get_contents(API_HOST . '/' . API_VERSION . '/oauth/token', false, $context);
$parsed_response = json_decode($response_body);

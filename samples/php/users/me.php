<?php
// ユーザー情報を取得する
define('API_HOST',    'https://api.thebase.in');
define('API_VERSION', '1');
$token = ''; # YOUR ACCESS TOKEN

$headers = array(
    'Authorization: Bearer ' . $token,
);
$request_options = array(
    'http' => array(
        'method' => 'GET',
        'header' => implode("\r\n", $headers),
        'ignore_errors' => true,
    ),
);
$context = stream_context_create($request_options);

$response_body = file_get_contents(API_HOST . '/' . API_VERSION . '/users/me', false, $context);
$parsed_response = json_decode($response_body);

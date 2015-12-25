<?php
// 商品一覧を取得する
define('API_HOST',    'https://api.thebase.in');
define('API_VERSION', '1');
$token = ''; # YOUR ACCESS TOKEN

$params = http_build_query(
    array(
        'order'  => 'created',
        'sort'   => 'desc',
        'limit'  => '10',
        'offset' => '0',
    )
);
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

$response_body = file_get_contents(API_HOST . '/' . API_VERSION . '/items?' . $params, false, $context);
$parsed_response = json_decode($response_body, true);

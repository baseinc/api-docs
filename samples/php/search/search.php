<?php
// 商品を検索する
define('API_HOST',    'https://api.thebase.in');
define('API_VERSION', '1');
define('CLIENT_ID_FOR_SEARCH',     ''); # Your client_id for search API
define('CLIENT_SECRET_FOR_SEARCH', ''); # Your client_secret for search API

$params = http_build_query(
    array(
        'client_id'     => CLIENT_ID_FOR_SEARCH,
        'client_secret' => CLIENT_SECRET_FOR_SEARCH,
        'q'             => 'Tシャツ シルクスクリーン 白',
        'sort'          => 'order_count desc,stock desc,price asc',
        'start'         => 0,
        'size'          => 10,
        'fields'        => 'shop_name,title,detail',
        'shop_id'       => '',
    )
);
$request_options = array(
    'http' => array(
        'method' => 'GET',
        'ignore_errors' => true,
    ),
);
$context = stream_context_create($request_options);

$response_body = file_get_contents(API_HOST . '/' . API_VERSION . '/search?' . $params, false, $context);
$parsed_response = json_decode($response_body, true);

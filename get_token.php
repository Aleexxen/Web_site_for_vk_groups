<?php
//Получение токена (не используется, так как подключен сервисный ключ доступа)
$permissions = [
    'friends', 'groups'
];

$request_params = [
    'client_id' => '7880119',
    'redirect_uri' => 'https://oauth.vk.com/blank.html',
    'response_type' => 'token',
    'display' => 'page',
    'score' => implode(',', $permissions)
];

$url = 'https://oauth.vk.com/authorize?' . http_build_query( $request_params );

echo $url;

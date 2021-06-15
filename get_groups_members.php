<?php
//Получение участников сообществ, (не используется)
$fields = ['connections', 'site', 'education', 'contacts', 'photo_max', 'status', 'city'];

$request_params = [
    'group_id' => 'apiclub',
    'sort' => 'id_asc',
    'offset' => 0,
    'count' => 2,
    'fields' => implode(',', $fields),
    'access_token' => 'c3520f77c3520f77c3520f776dc32a32c0cc352c3520f77a395c65e75dde1df2f32fcd9'
];

$url = "https://api.vk.com/method/groups.getMembers?" . http_build_query($request_params) . "&v=5.131";

$result = file_get_contents($url);
echo $result;
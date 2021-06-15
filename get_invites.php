<?php
//Приглашения в сообщества текущего пользователя, (не используется)
$fields = ['city', 'country', 'place', 'description', 'members_count'];

$request_params = [
    'group_ids' => 'hausofgaga,onepiece,itmem',
    'fields' => implode(',', $fields),
    'access_token' => 'c3520f77c3520f77c3520f776dc32a32c0cc352c3520f77a395c65e75dde1df2f32fcd9'
];

$url = "https://api.vk.com/method/groups.getInvites?" . http_build_query($request_params) . "&v=5.61";

$result = file_get_contents($url);
echo $result;
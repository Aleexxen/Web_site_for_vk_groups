<?php
//Получение данных групп из вк
//echo '<pre>';

//Запрошенные поля
$fields = ['id', 'name', 'screen_name', 'is_closed', 'type', 'photo_100', 'city', 'country', 'place', 'description', 'members_count'];
//Короткие имена групп
$groups = ['hausofgaga, onepiece, itmem, hearts__wandering, ia_panorama_itmo, anitype, phystech_kvant, asurveys, jumoreski, mb.news, proglib, k30.space, ab_ex, makeupandscience, dance_school_ditd'];

$request_params = [
    'group_ids' => implode(',', $groups),
    'fields' => implode(',', $fields),
//    Сервисный ключ доступа приложения, имеет доступ только к общедоступным данным
    'access_token' => 'c3520f77c3520f77c3520f776dc32a32c0cc352c3520f77a395c65e75dde1df2f32fcd9'
];

$url = "https://api.vk.com/method/groups.getById?" . http_build_query($request_params) . "&v=5.61";

$result = file_get_contents($url);

$data = json_decode($result, true);
//echo "<br>";

//var_dump($data);

return $data;

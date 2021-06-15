<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <title>Php web site</title>
</head>
<body>
<header>
    <div class="bg-dark collapse" id="navbarHeader" style="">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">О сайте</h4>
                    <p class="text-muted">Алексеева Ксения. Список рекомендованных сообществ</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Фильтры</h4>
                    <ul class="list-unstyled">
<!--                        <li><a href="#" class="text-white" id="f_subscribers">По количеству подписчиков</a></li>-->
                        <li><button type="button" class="btn btn-sm btn-outline-secondary" id="f_subscribers">По количеству подписчиков</button></li>
                        <li><button type="button" class="btn btn-sm btn-outline-secondary" id="f_cap">По длине подписи</button></li>
                        <li><button type="button" class="btn btn-sm btn-outline-secondary" id="f_name">По названию</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2"
                     viewBox="0 0 24 24">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                    <circle cx="12" cy="13" r="4"></circle>
                </svg>
                <strong>Рекомендованные группы</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" id="navbarToggler"
                    aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
<main>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="row-container">

                <?php
//                Разметка карточек групп по полученным данным из 'get_groups.php'
                $data = include 'get_groups.php';

                for ($i = 0; $i < count($data["response"]); $i++):
                    $link = $data["response"][$i]["photo_100"];
                    $caption = $data["response"][$i]["description"];
                    $members_count = $data["response"][$i]["members_count"];
                    $group_name = $data["response"][$i]["name"];
                    if(isset($data["response"][$i]["country"]["title"])){
                        $country = $data["response"][$i]["country"]["title"];
                    }
                    else{
                        $country = 'no country';
                    }
                    if(isset($data["response"][$i]["city"]["title"])){
                        $city = $data["response"][$i]["city"]["title"];
                    }
                    else{
                        $city = 'no city';
                    }

                    $is_closed = $data["response"][$i]["is_closed"];
                    if($is_closed == 0){
                        $is_closed = 'открытое';
                    }elseif ($is_closed == 1){
                        $is_closed = 'закрытое';
                    }else{
                        $is_closed = 'частное';
                    }

                    file_put_contents("img/$i.jpg", file_get_contents($link));
                    ?>
                    <div class="col" id="row-element"<?php echo $group_name ?>">
                        <div class="card shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="card-name fw-normal"><?php echo $group_name ?></h4>
                            </div>
                            <img class="card-img-top embed-responsive-item" width="100%" height="225"
                                 src="img/<?php echo $i ?>.jpg" alt=""/>
                            <!--                        <div class="card-header py-3">-->
                            <!--                            <h4 class="my-0 fw-normal">--><?php //echo $group_name
                            ?><!--</h4>-->
                            <!--                        </div>-->
                            <div class="card-body embed-responsive-item">
                                <p class="card-text"><?php echo $caption ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><?php echo $country ?></button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><?php echo $city ?></button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><?php echo $is_closed ?></button>
                                    </div>
                                    <small class="text-muted">Подписчиков: <?php echo $members_count ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>

            </div>
        </div>
    </div>
</main>
<!--Действия для фильтров-->
<script src="js/filter.js"></script>
</body>
</html>